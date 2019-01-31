<?php

use Illuminate\Database\Seeder;
<<<<<<< HEAD

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mechi',
            'email' => 'mechi@octopus.com.ar',
            'password' => bcrypt('123456'),
        ]);
    }
=======
use App\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        factory(App\User::class, 10)->create();
    }

>>>>>>> add jwt login
}
