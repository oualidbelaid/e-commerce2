<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{

    public function index()
    {
        $nbr_or = count(Order::all());
        $totalSales = 0;
        $orders = Order::where("order_status", "delivered")->get();
        foreach ($orders as $item) {
            $totalSales += $item->total;
        }
        if (count(Order::all()) > 0) {
            $orders = Order::orderBy('created_at', 'DESC')->paginate(8);
        } else {
            $orders = Order::orderBy('created_at', 'DESC')->get();
        }
        return view("admin.index")->with(["users" => User::all(), "totalSales" => $totalSales, "orders" => $orders, "nbr_or" => count(Order::all())]);
    }

}
