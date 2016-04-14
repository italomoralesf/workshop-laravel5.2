<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AppTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUser()
    {
    	//Register
        $this->visit('/')
        	->click('Register')
            ->seePageIs('/register')
            ->see('Register')
            ->type('Italo Morales', 'name')
            ->type('i@italomoralesf.com', 'email')
            ->type('secret', 'password')
            ->type('secret', 'password_confirmation')
            ->press('Register')
            ->seeInDatabase('users', ['email' => 'i@italomoralesf.com'])
            ->seePageIs('/home')
            ->see('Nuevo Keep')
            ->click('Logout')
            ->seePageIs('/');

        //Login
        $this->visit('/')
        	->click('Login')
            ->seePageIs('/login')
            ->see('Login')
            ->type('i@italomoralesf.com', 'email')
            ->type('secret', 'password')
            ->press('Login')
            ->seePageIs('/home')
            ->see('Nuevo Keep')
            ->click('Logout')
            ->seePageIs('/');

        //Keep
        $this->visit('/login')
            ->see('Login')
            ->type('i@italomoralesf.com', 'email')
            ->type('secret', 'password')
            ->press('Login')
            ->seePageIs('/home')
            //save keep
            ->type('Grabar video tutorial', 'keep')
            ->press('Registrar')
            ->seePageIs('/home')
            //change status keep
            ->press('btn-keep')
            ->seePageIs('/home')
            //delete keep
            ->press('Eliminar')
            ->seePageIs('/home')

            ->click('Logout')
            ->seePageIs('/');
    }
}
