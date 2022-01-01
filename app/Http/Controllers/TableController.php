<?php

namespace App\Http\Controllers;
use App\Models\Table;

use Illuminate\Http\Request;

class TableController extends Controller
{
    // Api
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tablesShow()
    {
        return Table::all();
    }
    // End api func


    public function tablesIndex()
    {
        $tables = Table::all();
        return view('admin/table/index', compact('tables'));
    }
    public function addTable()
    {
        return view('admin/table/add');
    }
    public function editTable($id)
    {
        $table = Table::find($id);
        return view('admin/table/edit', compact('table'));
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTable(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'chairs' => 'required',
        ]);

        Table::create($request->all());
        return back()->with('success', 'Table has successfully uploaded!');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Table::find($id);
        $table->delete();   
        return back()->with('success', 'Table has successfully Deleted!'); 
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
        $data = Table::find($id);
        $data->update($request->all());
        // return $data;
        return back()->with('success', 'Table has successfully uploaded!');
    }
}
