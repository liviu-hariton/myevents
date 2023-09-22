<?php

namespace Database\Seeders;

use App\Models\Attendee;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $events = Event::all();

        foreach($users as $user) {
            $events_to_attend = $events->random(rand(1, 3));

            foreach($events_to_attend as $event_to_attend) {
                Attendee::create([
                    'user_id' => $user->id,
                    'event_id' => $event_to_attend->id
                ]);
            }
        }
    }
}
