<?php

namespace App\Jobs;

use App\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use AlgoliaSearch\Client as Algolia;

class PushArchivedBookingsToSearch implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $algolia;

    /**
     * Create a new job instance.
     *
     * @internal param Algolia $algolia
     */
    public function __construct()
    {
        $this->algolia = new Algolia(env('ALGOLIA_APP_ID'), env('ALGOLIA_SECRET'));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $index = $this->algolia->initIndex('testsite');
        $index->addObjects(Booking::onlyTrashed()->get()->map(function ($model) {
            return array_merge(['objectID' => $model->getKey()], $model->toSearchableArray());
        })->values()->all());
    }
}
