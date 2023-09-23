<?php

namespace App\Console\Commands;

use App\Models\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SendEventReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-event-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send events reminders';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $events = Event::with('attendees.user')
            ->whereBetween('start_time', [now(), now()->addDay()])
            ->get();


        $events->each(
            fn($event) => $event->attendees->each(
                fn($attendee) => $this->info('Notifying user '.$attendee->user->id)
            )
        );


        /*$events_count = $events->count();
        $events_label = Str::plural('event', $events_count);

        $this->info('Found '.$events_count.' '.$events_label);

        $this->info('Notifications send successfully');*/
    }
}
