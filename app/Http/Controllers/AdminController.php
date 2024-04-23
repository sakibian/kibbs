<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $bookings = Booking::all();
        
        return view('admin.index', compact(['users', 'bookings']));
    }
}
