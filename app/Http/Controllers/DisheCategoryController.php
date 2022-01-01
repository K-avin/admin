<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class DisheCategoryController extends Controller
{
    // Api
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categorysShow()
    {
        return Category::all();
    }
    // ---------------------

    public function categoryIndex()
    {
        $categorys = Category::all();
        // dd($category);
        return view('admin/dish_category/index', compact('categorys'));
    }

    public function addCategory()
    {
        return view('admin/dish_category/add');
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('admin/dish_category/edit',compact('category'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());
        return back()->with('success', 'File has successfully uploaded!');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();   
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
        $data = Category::find($id);
        $data->update($request->all());
        // return $data;
        return back()->with('success', 'Restaurant has successfully uploaded!');
    }
}
