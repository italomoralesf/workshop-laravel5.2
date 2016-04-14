<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PageTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testVisitPages()
    {
        //Home
        $this->visit('/')
            ->see('Welcome')
            ->see("Your Application's Landing Page.");

        //Guest
        $this->visit('/')
            ->click('Home')
            ->seePageIs('/login')
            ->see('Login');

        $this->visit('/')
            ->click('Login')
            ->seePageIs('/login')
            ->see('Login');

        $this->visit('/')
            ->click('Register')
            ->seePageIs('/register')
            ->see('Register');
    }
}
