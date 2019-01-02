<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
           'name' => 'superAdmin'
        ]);
        DB::table('roles')->insert([
            'name' => 'deblock'
        ]);
        DB::table('roles')->insert([
            'name' => 'remito'
        ]);
    }
}
