<?php

namespace App\Jobs;

use App\Booking;
use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Camper;

class BookingJobs extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $booking;

    /**
     * Create a new job instance.
     *
     * @param Booking $booking
     *
     * @internal param Camper $camper
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Execute the job.
     *
     * @param Mailer $mailer
     */
    public function handle(Mailer $mailer)
    {
        $booking = $this->booking;

        $mailer->send('emails.user.bookingRequest', ['booking' => $this->booking, 'campers' => $this->booking->campers()], function($m) use ($booking) {
            $m->from('bookings@danscampertrailerhire.com.au', 'Dan\'s Camper Trailer Hire');

            $m->to($booking->email, 'Ryan Murray')->subject('Booking request for '.$booking->first_name.' '.$booking->last_name);
        });

        $mailer->send('emails.admin.bookingRequest', ['booking' => $this->booking, 'campers' => $this->booking->campers()], function($m) use ($booking) {
            $m->from('bookings@danscampertrailerhire.com.au', 'Dan\'s Camper Trailer Hire');

            $m->to('ryanmurrayemail@gmail.com', 'Ryan Murray')->subject('Booking request for '.$booking->first_name.' '.$booking->last_name);
        });
    }
}
