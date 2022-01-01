<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

    // Api
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ordersShow($id)
    {
        // $key = $request->key;
        // console($key);

        $orders = Order::where('customer_id','=', $id)->get();

        if(!$orders){
            return response()->json(['fail' => 'authentication required']);
        }
        return response()->json($orders);        
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrder(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'dishe_id' => 'required',
            'restaurant_id' => 'required',
            'table_id' => 'required',
            'total' => 'required',
        ]);

        return Order::create($request->all());
    }
}
