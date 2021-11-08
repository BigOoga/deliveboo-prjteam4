<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $orders= Order::all();
=======
        $orders = Order::all();
>>>>>>> 2c7ca8e95c3234083c95c0a0188a0e18bd27b177
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        return view('orders.create');
=======
        //
>>>>>>> 2c7ca8e95c3234083c95c0a0188a0e18bd27b177
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $data = $request->all();
        $newOrder = new Order();
        $newOrder->fill($data);
        $newOrder->save();
=======
        //
>>>>>>> 2c7ca8e95c3234083c95c0a0188a0e18bd27b177
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
=======
    public function show($id)
    {
        //
>>>>>>> 2c7ca8e95c3234083c95c0a0188a0e18bd27b177
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
=======
    public function destroy($id)
    {
        //
>>>>>>> 2c7ca8e95c3234083c95c0a0188a0e18bd27b177
    }
}
