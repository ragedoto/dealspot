<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        return view('admin.index', [
            'usersCount' => User::count(),
            'listingsCount' => Listing::count(),
            'ordersCount' => Order::count(),
        ]);
    }
}