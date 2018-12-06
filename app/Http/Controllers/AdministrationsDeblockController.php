<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdministrationsDeblockController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deblock(){

        dd(DB::connection('sqlite')->select('select * from logs'));
        $users = DB::connection('pgsql')->select('select * from administrations where unregistered_payment = true');

        $administrations = [];

        foreach($users as $user){
            $administrations[] = (array) $user;
        }

        return view('deblock')->with('administrations', $administrations);
    }
    public function deblockAdministrations(Request  $request){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        foreach($request['administrationID'] as $adminID){
            DB::connection('pgsql')->update("update administrations set unregistered_payment = false where id =  $adminID ;");
            DB::connection('sqlite')->insert('insert into logs(user_id, administrations_id, created_at) values (?, ?, ?)', [Auth::id(), $adminID, date("d-m-Y"). ' '. date("h:i:sa")]);
        }

        return redirect('/deblock');
        
    }

}
