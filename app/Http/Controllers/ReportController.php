<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function whitelistAdministrations(){

        $administrations = DB::connection('pgsql')->select('select * from administrations  where whitelist = true');

        $blocked = DB::connection('pgsql')->select('select * from administrations where unregistered_payment = true order by id');

        $almost = DB::connection('pgsql')->select ('select * from administrations where days_of_debt BETWEEN 50 and 60');

        $admin1 = [];
        $block1 = [];
        $almost1 = [];
        foreach($administrations as $admin){
            $admin1[] = (array) $admin;
        }
        foreach($blocked as $admin){
            $block1[] = (array) $admin;
        }
        foreach($almost as $admin){
            $almost1[] = (array) $admin;
        }

        $data = [
            'administrations' => $admin1,
            'blocked'         => $block1,
            'almost'          => $almost1
        ];

        //dd($data);

        return view('report')->with('data', $data);
    }
}
