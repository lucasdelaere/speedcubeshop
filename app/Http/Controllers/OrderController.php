<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::withTrashed()->paginate(20);

        return view("backend.orders.index", [
            "orders" => $orders,
        ]);
    }
}
