<?php

namespace App\Http\Controllers;
use App\Models\Dishes;
use App\Models\Restaurant;
use App\Models\Category;

use Illuminate\Http\Request;

class DishesController extends Controller
{
    // Api
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dishesShow()
    {
        return Dishes::all();
    }


    public function dishesIndex()
    {
        $dishes = Dishes::all();
        // dd($dishes);
        return view('admin/dishes/index',compact('dishes'));
    }

    public function addDishes()
    {
        $restaurant = Restaurant::select('name','id')->get();
        $categorys = Category::select('name','id')->get();
        // dd($restaurant);
        return view('admin/dishes/add',compact('restaurant','categorys'));
    }

    public function editDish($id)
    {
        $restaurant = Restaurant::select('name','id')->get();
        $categorys = Category::select('name','id')->get();
        $dish = Dishes::find($id);
        // dd($restaurant);
        return view('admin/dishes/edit', compact('dish','restaurant','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDishes(Request $request)
    {
           
        $request->validate([
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
          ]);

          $name = $request->file('image')->getClientOriginalName();
          $path = $request->file('image')->store('public/uploads');
          $i_path = $path;
          $image_path = substr($i_path, 7);

              $fileModal = new Dishes();
              $fileModal->image = $image_path;
              $fileModal->name = $request->name;
              $fileModal->restaurant = $request->restaurant;
              $fileModal->category = $request->category;
              $fileModal->price = $request->price;

              $fileModal->save();
      
             return back()->with('success', 'Dish has successfully ceeated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Dishes::find($id);
        $restaurant->delete();   
        return back()->with('success', 'Dish has successfully deleted!'); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
          ]);

          $name = $request->file('image')->getClientOriginalName();
          $path = $request->file('image')->store('public/uploads');
          $i_path = $path;
          $image_path = substr($i_path, 7);

              $fileModal = Dishes::find($id);
              $fileModal->image = $image_path;
              $fileModal->name = $request->name;
              $fileModal->restaurant = $request->restaurant;
              $fileModal->category = $request->category;
              $fileModal->price = $request->price;

              $fileModal->save();
      
             return back()->with('success', 'Dish has successfully ceeated!');

        // $data = Dishes::find($id);
        // $data->update($request->all());
        // // return $data;
        // return back()->with('success', 'Restaurant has successfully uploaded!');
    }
}
