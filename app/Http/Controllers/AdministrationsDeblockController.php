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
        $this->middleware('role:deblock');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deblock(){

        //dd(DB::connection('sqlite')->select('select * from logs'));
        $users = DB::connection('pgsql')->select('select * from administrations where unregistered_payment = true order by id');

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

    public function whitelist(){

        $users = DB::connection('pgsql')->select('select * from administrations order by id');

        $administrations = [];

        foreach($users as $user){
            $administrations[] = (array) $user;
        }

        return view('whitelist')->with('administrations', $administrations);
    }

    public static function isInWhitelist($id)
    {
        $administration = DB::connection('pgsql')->select('select * from administrations where id = ? and whitelist = true', [$id]);

        return $administration !== [];
    }

    public function whitelistAdmin($id){
        if(!$this->isInWhitelist($id)){
            DB::connection('pgsql')->update("update administrations set whitelist = true where id = $id");
            //DB::connection('sqlite')->insert('insert into logs(user_id, administrations_id, movement, created_at) values (?, ?, ?,?)', [Auth::id(), $id,'whitelist_in', date("d-m-Y"). ' '. date("h:i:sa")]);

        } else {
            DB::connection('pgsql')->update("update administrations set whitelist = false where id = $id");
            //DB::connection('sqlite')->insert('insert into logs(user_id, administrations_id, movement, created_at) values (?, ?, ?,?)', [Auth::id(), $id,'whitelist_out', date("d-m-Y"). ' '. date("h:i:sa")]);

        }
        return redirect('/whitelist');

    }
    public static function getWhitelistReason($id){
        $reason = (array) DB::connection('sqlite')->select('select * from whitelist_reason where administration_id = '. $id);

        if ($reason){
            $reason1 = (array) $reason[0];
        } else {
            $reason1['reason'] = null;
        }

        return $reason1['reason'];
    }

}
