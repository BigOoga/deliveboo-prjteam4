<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
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

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:restaurants|email',
                'password' => 'required|min:8',
                'address' => 'required',
                'iva' => 'required|unique:restaurants|digits:11',
                'description' => 'nullable',
                'opening_time' => 'required',
                'closing_time' => 'required',
                'delivery_fee' => 'required|numeric',
                'image' => 'mimes:jpeg,png,jpg'
            ],
            [
                'required' => 'Questo campo è obbligatorio',
                'numeric' => 'Questo campo deve essere numerico',
                'password.min' => 'La password richiede almeno 8 caratteri',
                'iva.digits' => 'Questo campo richiede 11 numeri',
                'unique' => 'Il parametro che hai inserito esiste già!',
                'image.mimes' => 'Il file dev\'essere in formato .jpg o .png'
            ]
        );

        $data = $request->all();
        //dd($data);
        $newRestaurant = new Restaurant();
        $newRestaurant->fill($data);
        $newRestaurant->password = bcrypt($data['password']);



        //? Non sono sicuro sia il modo migliore di controllare se è presente un'immagine
        if ($request->has('image')) {
            $img_path = Storage::put('uploads', $data['image']);
            $newRestaurant->image = $img_path;
            //$newRestaurant->image = url($newRestaurant->image);
        }

        // Forziamo is_open a true durante la registrazione
        $newRestaurant->is_open = true;
        $newRestaurant->save();
        $newRestaurant->types()->attach($data['types']);
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show', compact('restaurant'));
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


    public function dashboard()
    {
        $user_id = Auth::id();

        $restaurants = Restaurant::all();
        $restaurant = $restaurants->find($user_id);
        return view('restaurants.dashboard', compact('restaurant'));
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
