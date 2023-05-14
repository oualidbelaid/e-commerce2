<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::orderBy('created_at', 'DESC')->paginate(8);
        return view("admin/customers.index")->with('customers', $customers)->with('nbr_c', count(User::all()) / 8);
    }

    public function show($name)
    {
        $user = User::where("name", $name)->first();
        return view("admin/profile.index")->with("profile", $user->profile);
    }
}