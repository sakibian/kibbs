<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'age', 'gender', 'booking_date', 'shift', 'time', 'duration'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    static public function hasBooking($date) {
        return count(Parent::whereDate('booking_date', $date)->get());
    }
}
