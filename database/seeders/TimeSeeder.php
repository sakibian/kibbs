<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Time;
use Carbon\Carbon;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Time::create([
        //     'time_slots' => '10:00am - 10:15am (15min)',
        // ]);

        $time_slots =  [
            //Morning:
            [
                'time_slot' => '10:00am - 10:15am',
                'time_duration' => 15,
                'time_shift' => 'M',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '10:30am - 11:00am',
                'time_duration' => 30,
                'time_shift' => 'M',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '11:15am - 11:30am',
                'time_duration' => 15,
                'time_shift' => 'M',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //Afternoon:
            [
                'time_slot' => '11:45am - 12:15pm',
                'time_duration' => 30,
                'time_shift' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '12:30pm - 12:45pm',
                'time_duration' => 15,
                'time_shift' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '1:00pm - 1:30pm',
                'time_duration' => 30,
                'time_shift' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '1:45pm - 2:00pm',
                'time_duration' => 15,
                'time_shift' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '2:15pm - 2:45pm',
                'time_duration' => 30,
                'time_shift' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '3:00pm - 3:15pm',
                'time_duration' => 15,
                'time_shift' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '3:30pm - 4:00pm',
                'time_duration' => 30,
                'time_shift' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '4:15pm - 4:30pm',
                'time_duration' => 15,
                'time_shift' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '4:45pm - 5:15pm',
                'time_duration' => 30,
                'time_shift' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '5:30pm - 5:45pm',
                'time_duration' => 15,
                'time_shift' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //Evening:
            [
                'time_slot' => '6:00pm - 6:30pm',
                'time_duration' => 30,
                'time_shift' => 'E',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '6:45pm - 7:00pm',
                'time_duration' => 15,
                'time_shift' => 'E',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '7:15pm - 7:45pm',
                'time_duration' => 30,
                'time_shift' => 'E',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '8:00pm - 8:15pm',
                'time_duration' => 15,
                'time_shift' => 'E',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '8:30pm - 9:00pm',
                'time_duration' => 30,
                'time_shift' => 'E',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '9:15pm - 9:30pm',
                'time_duration' => 15,
                'time_shift' => 'E',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '9:45pm - 10:15pm',
                'time_duration' => 30,
                'time_shift' => 'E',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '10:30pm - 10:45pm',
                'time_duration' => 15,
                'time_shift' => 'E',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'time_slot' => '11:00pm - 11:30pm',
                'time_duration' => 30,
                'time_shift' => 'E',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
          ];

          Time::insert($time_slots);
    }
}
