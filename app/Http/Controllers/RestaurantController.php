<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Restaurant;
use App\Models\Type;



class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = type::all();
        return view('restaurants.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',

            //? prima era required|Unsigned che non esiste
            'iva' => 'required|unique:restaurants',

            'description' => 'nullable',
            'opening_time' => 'required',
            'closing_time' => 'required',
            'delivery_fee' => 'required|numeric',
        ]);

        $data = $request->all();
        $newRestaurant = new Restaurant();
        $newRestaurant->fill($data);
        $newRestaurant->password = bcrypt($data['password']);

        //? Non sono sicuro sia il modo migliore di controllare se è presente un'immagine
        if ($request->has('image')) {
            $img_path = Storage::put('uploads', $data['image']);
            $newRestaurant->image = $img_path;
        }

        // Forziamo is_open a true durante la registrazione
        $newRestaurant->is_open = true;
        $newRestaurant->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //todo pagina in cui il ristoratore può cambiare i propri dati
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
    public function destroy($id)
    {
        //
    }
}
