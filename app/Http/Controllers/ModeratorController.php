<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;

class ModeratorController extends Controller
{
    /**
     * Display the moderator dashboard.
     */
    public function index()
    {
        return view('moderator.index', [
            'usersCount' => User::count(),
            'listingsCount' => Listing::count(),
        ]);
    }
}