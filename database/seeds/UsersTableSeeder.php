<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name'      => 'Italo Morales',
            'email'     => 'i@italomoralesf.com',
            'password'  => bcrypt('secret'),
        ]);
        
        factory(User::class, 19)->create();
    }
}
