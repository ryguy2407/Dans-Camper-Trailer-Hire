<?php

namespace App\Jobs;

use App\Http\Requests\SendContactRequest;
use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $formData;

    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    /**
     * Execute the job.
     *
     * @param Mailer $mailer
     *
     * @internal param SendContactRequest $request
     */
    public function handle( Mailer $mailer )
    {

        $data = $this->formData;

        $mailer->send('emails.user.contact', $this->formData, function($m) use ($data) {
            $m->from($data['email'], $data['name']);

            $m->to('bookings@hiremycampertrailer.com.au', 'Dan\'s Camper Trailer Hire')->subject($data['name'].' has made an enquiry');
        });
    }
}
