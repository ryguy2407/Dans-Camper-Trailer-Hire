<?php

namespace App\Providers;

use App\Calendar\Calendar;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['users.show'], 'App\Http\ViewComposers\adminComposer'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('calendar', function(){
            return new Calendar();
        });

        $this->app->bind('mailchimp', function(){
            $client = new Client();
            $res = $client->request('GET', 'https://us3.api.mailchimp.com/3.0/lists', [
                'auth' => ['ryanmurrayemail@gmail.com', '1ca3e7552cec5fbefbd01c453b29d1a7-us3']
            ]);
            return $res->getBody();
        });
    }
}
