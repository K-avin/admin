<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDishes;

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

        $orders = Order::where('customer_id','=', $id)->latest()->first();
        $food = OrderDishes::where('order_id','=', $orders->id)->get();

        $fo = ['order'=> $orders,'food'=> $food];

        if(!$orders){
            return response()->json(['fail' => 'authentication required']);
        }
        return response()->json($fo);        
        
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
            'restaurant_id' => 'required',
            'table_id' => 'required',
        ]);
        Order::create($request->all());
        $order = Order::latest()->first();
        $orderid = $order->id;

        if($orderid){
            $request->validate([
                'dishe_id' => 'required',
            ]);
            for($x=1;$x<=5;$x++){
                $request['order_id'] = $orderid;
                OrderDishes::create($request->all());
            }
        }

    }
}
