<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Auth;

class HomeController extends Controller
{
    public function index() {
        $admin = User::where('is_admin', '=', 1)->first();

        $date = Carbon::now();
        $weekStartDate = $date->startOfWeek()->format('Y-m-d');
        $weekEndDate = $date->endOfWeek()->format('Y-m-d');

        $monthStartDate = $date->startOfMonth()->format('Y-m-d');
        $monthEndDate = $date->endOfMonth()->format('Y-m-d');

        $getEverydayOfMonth = CarbonPeriod::create($monthStartDate, $monthEndDate);
        $getEverydayOfMonth->toArray();

        $currentMonth = Carbon::now()->format('M');
        $currentYear = Carbon::now()->format('Y');

        $today = Carbon::today();

        return view('home', compact([
            'admin',
            'currentMonth',
            'currentYear',
            'getEverydayOfMonth',
            'today'
        ]));
    }
}
