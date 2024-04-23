<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Time;
use Carbon\Carbon;
use Session;
use Mail;
use Auth;
use DB;

class BookingController extends Controller
{
   
    public function index()
    {
        // Get related user bookings via eloquent.
        $bookings = auth()->user()->bookings()->latest()->get();

        // Find Admin
        $admin = User::where('is_admin', '=', 1)->first();
        
        //Week date first and Last like (1 - 7)
        $date = Carbon::today();
        $weekStartDate = $date->startOfWeek()->format('Y-m-d');
        $weekEndDate = $date->endOfWeek()->format('Y-m-d');

        // Renaming the dates
        $startDate = $weekStartDate;
        $endDate = $weekEndDate;

        //Checking booking date with today's date time.
        $currentTime = Carbon::now('Europe/London');

        $bookingCount = Booking::where('user_id', Auth::user()->id)
            ->whereDate('booking_date', '>=', $startDate)
            ->whereDate('booking_date', '<=', $endDate)->count();

        
        return view('user.booking.index', compact([
            'bookings', 
            'admin', 
            'bookingCount', 
            'currentTime'
        ]));

    }

    
    public function create()
    {
        return view('user.booking.create');
    }

    public function bookingTimes(Request $request) {
        
        $UserSelectedDate = $request->input('booking_date');
        
        $bookings = Booking::select('time')
        ->where('booking_date', '=', $UserSelectedDate)->get();

        $allTimes = Time::all();
        $times = [];

        foreach($allTimes as $time){
            $found = false;

            foreach($bookings as $booking){
                if($booking->time == $time->time_slot){
                    $found = true;
                    break;
                }
            }

            $time_tmp = explode(" - ", $time->time_slot);


            if($UserSelectedDate == date("Y-m-d") && 
                strtotime($time_tmp[0]) < strtotime(Carbon::now('Europe/London')))
            {
                $found = true;
            }

            $time->is_unavailable = $found;
            array_push($times, $time);

        }

        return view('user.booking.bookingTimes', compact([
            'times'
        ]));
    }

    
    public function store(Request $request)
    {
        $this->validate($request, array(
            'age'          => 'required',
            'gender'          => 'required',
            'shift'          => 'required',
            'booking_date'          => 'required',
            'time'         => 'required',
            'duration'         => 'required'
        ));

        // Getting start and end week booking_date
        $date = Carbon::parse($request->booking_date);
        $weekStartDate = $date->startOfWeek()->format('Y-m-d');
        $weekEndDate = $date->endOfWeek()->format('Y-m-d');

        $startDate = $weekStartDate;
        $endDate = $weekEndDate;

        $count = Booking::where('user_id', Auth::user()->id)
                ->whereDate('booking_date', '>=', $startDate)
                ->whereDate('booking_date', '<=', $endDate)->count();

        if ($count >= 5) {
            return redirect()->route('user.notice.index');
        }

        // store in the database
        $booking = new Booking;

        $booking->user_id = auth()->user()->id;
        $booking->age = $request->age;
        $booking->gender = $request->gender;
        $booking->booking_date = $request->booking_date;
        $booking->weekStartDate = $weekStartDate;
        $booking->weekEndDate = $weekEndDate;
        $booking->shift = $request->shift;
        $booking->time = $request->time;
        $booking->duration = $request->duration;

        Mail::send('emails.booking', [
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'booking_date' => $request->get('booking_date'),
            'shift' => $request->get('shift'),
            'time' => $request->get('time'),
            'duration' => $request->get('duration') 
            ],
            function ($message) use ($request) {
                    $message->from(Auth::user()->email);
                    $message->to('kibbs.co@gmail.com', 'Kibbs')
                    ->subject('New booking has made on kibbs.co.uk');
        });

        $booking->save();

        return redirect()->route('user.bookings.index')->with('status', 'Success');

    }

  
    public function show($id)
    {
        $id = User::where('is_admin', '=', 1)->first();
        return view('user.booking.show', $id);
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
