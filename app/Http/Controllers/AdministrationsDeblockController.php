<?php

namespace App\Http\Controllers;

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
        $users = DB::connection('pgsql')->select('select * from administrations where unregistered_payment = true');

        $administrations = [];

        foreach($users as $user){
            $administrations[] = (array) $user;
        }

        return view('deblock')->with('administrations', $administrations);
    }
    public function deblockAdministrations(Request  $request){
        foreach($request['administrationID'] as $adminID){
            DB::connection('pgsql')->update("update administrations set unregistered_payment = false where id =  $adminID ;");
        }
        return redirect('/deblock');
        
    }

}
