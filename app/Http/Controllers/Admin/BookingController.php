<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use Session;
use Auth;
use Mail;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::with('user')->latest()->orderBy('created_at')->get();
        return view('admin.booking.index', compact('bookings'));
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {

       //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id, Request $request)
    {
        $booking = Booking::find($id);
        $userName = $booking->user->name;
        $userEmail = $booking->user->email;
        
        $booking->delete();

        Mail::send('emails.deleteNotification', [
            'name' => $userName,
            'email' => $userEmail,
            'booking_delete_reason' => $request->get('booking_delete_reason') 
        ],
            function ($message) use ($userEmail) {
                    $message->from($userEmail);
                    $message->to('kibbs.co@gmail.com', 'Kibbs')
                    ->subject('Booking has been removed.');
        });

        return redirect()->route('admin.bookings.index')
        ->with('status', 'Deleted, User will be notified with the reasons');
    }
}
