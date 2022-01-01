<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Dashboard()
    {
        return view('admin/index');
    }
    // Order
    public function ordersIndex()
    {
        return view('admin/orders/index');
    }

    // Customers
    public function customersIndex()
    {
        return view('admin/customer/index');
    }
    
}

