<?php

namespace App\Http\Controllers;


use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Dish;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id = Auth::id();
        $orders = DB::table('orders')
            ->select('orders.*')
            ->join('dish_order', 'dish_order.order_id', '=', 'orders.id')
            ->join('dishes', 'dish_order.dish_id', '=', 'dishes.id')
            ->join('restaurants', 'dishes.restaurant_id', '=', 'restaurants.id')
            ->where('restaurants.id', $user_id)->groupBy('order_id')
            ->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newOrder = new Order();
        $newOrder->fill($data);
        $newOrder->status = 0;
        $newOrder->save();

        // storo l'array di IDs
        $IDArray = $data['dish_ids'];
        $QuantityArray = $data['quantity'];
        $arrayLength = count($IDArray);

        // Ciclo una volta per ogni piatto contenuto nell'ordine, salvo la relazione e la sua quantità
        for ($i = 0; $i < $arrayLength; $i++) {
            $dish_id = $IDArray[$i];
            // Scrive nella tabella pivot dopo aver creato la relazione
            $newOrder->dishes()->attach([$dish_id => ['quantity' => $QuantityArray[$i]]]);
            //
        }


        return redirect()->route('orders.show', $newOrder);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

        $dishes = DB::table('dishes')
            ->join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
            ->join('orders', 'dish_order.order_id', '=', 'orders.id')
            ->select('dishes.*', 'dish_order.quantity')->where('order_id', $order->id)
            ->get();
        return view('orders.show', compact('order', 'dishes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $data = $request->all();
        $order->update($data);

        return redirect()->route('orders.show', $order->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }

    public function statistic()
    {
        $user_id = Auth::id();

        $orders = DB::select("SELECT MONTH(o.created_at) AS month, count(DISTINCT o.id) AS sales FROM `orders`as o
        INNER JOIN dish_order as do ON do.order_id=o.id
        INNER JOIN dishes as d on d.id=do.dish_id
        WHERE d.restaurant_id = $user_id
        GROUP BY month(o.created_at)");
        $orders = json_encode($orders);
        return view('orders.statistic', compact('orders'));
    }
}
