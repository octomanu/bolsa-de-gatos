<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        $this->call(UsersTableSeeder::class);
        $this->call(RoleTableSeeder::class);
=======
   
        $this->call(UsersTableSeeder::class);
      
>>>>>>> add jwt login
    }
}
 