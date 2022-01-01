<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    // Api
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function restaurantShow()
    {
        return Restaurant::all();
    }


    public function restaurantIndex()
    {
        $restaurants = Restaurant::all();
        // dd($restaurants);
        return view('admin/restaurant/index', compact('restaurants'));
    }
    public function addRestaurant()
    {
        return view('admin/restaurant/add');
    }
    public function editRestaurant($id)
    {
        $restaurant = Restaurant::find($id);
        // dd($restaurant);
        return view('admin/restaurant/edit', compact('restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRestaurant(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        Restaurant::create($request->all());
        return back()->with('success', 'File has successfully uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Restaurant::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();   
        return back()->with('success', 'Restaurant has successfully Deleted!'); 
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
        $data = Restaurant::find($id);
        $data->update($request->all());
        // return $data;
        return back()->with('success', 'Restaurant has successfully uploaded!');
    }
}
