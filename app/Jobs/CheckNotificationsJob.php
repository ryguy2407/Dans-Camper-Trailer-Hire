<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Notification;

class CheckNotificationsJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $bookingData;
    public function __construct($bookingData)
    {
        $this->bookingData = $bookingData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Get the current day
        //Make a comparison
        //If inside the rules save to db and activate

        $notification = new Notification();
        $returned = $notification->check($this->bookingData);
        if($returned) {
            $notification->save($returned);
            return true;
        } else {
            $notification->removeAll();
        }
    }
}
