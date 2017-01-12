<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StaticPagesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStaticPages()
    {
        $this->visit('/rates');
        $this->visit('/booking-enquiry');
        $this->visit('/contact');
        $this->visit('/login');
        $this->visit('/blog');
    }
}
