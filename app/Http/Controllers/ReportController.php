<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:report');
    }
    public function whitelistAdministrations(){

        $administrations = DB::connection('pgsql')->select('select * from administrations  where whitelist = true order by name');

        $blocked = DB::connection('pgsql')->select('select * from administrations where unregistered_payment = true order by id');

        $almost = DB::connection('pgsql')->select ('select * from administrations where days_of_debt BETWEEN 30 and 60 order by days_of_debt DESC');

        $active = DB::connection('pgsql')->select ("select * from consortia WHERE status = 'ACTIVE' ORDER BY fancy_name");


        $admin1 = [];
        $block1 = [];
        $almost1 = [];
        $active1 = [];
        foreach($administrations as $admin){
            $admin1[] = (array) $admin;
        }
        foreach($blocked as $admin){
            $block1[] = (array) $admin;
        }
        foreach($almost as $admin){
            $almost1[] = (array) $admin;
        }
        foreach($active as $admin){
            $active1[] = (array) $admin;
        }

        $data = [
            'administrations' => $admin1,
            'blocked'         => $block1,
            'almost'          => $almost1,
            'active'          => $active1
        ];

        //dd($data);

        return view('report')->with('data', $data);
    }

    public function search(){

        return view('searchFilter');

    }

    public static function administrationNameById($id){
        $name = DB::connection('pgsql')->select ('select name from administrations where id = '. $id);

        $name1 = (array) $name[0];

        return $name1['name'];
    }

    public function searchBy(Request $request){

        $query = '';

        if ($request->input('por') == 'administration'){
            $query .= ' select * from administrations';
            if ($request->input('name')){
                $query .= " where LOWER(name) like LOWER('%" .$request->input('name'). "%')";
            }
        } else if ($request->input('por') == 'consortium'){
            $query .= 'select * from consortia';
            if ($request->input('name')){
                $query .= " where LOWER(business_name) like LOWER('%" .$request->input('name'). "%')";;
            }
            if ($request->input('manual_billing') == 'on'){
                if ($request->input('name')){
                    $query .= ' and auto_billing = false';
                } else {
                    $query .= ' where auto_billing = false';
                }
            }
        }

        $results = DB::connection('pgsql')->select($query);

        $result1 = [];

        foreach($results as $result){
            $result1[] = (array) $result;
        }

        return view('searchFilter')->with('data', $result1);

    }

    public function infoAdministration($id){

        $administracion1 = (array)  DB::connection('pgsql')->select('select * from administrations WHERE id = '. $id);

        $administracion = (array) $administracion1[0];

        return view('moreInfo')->with('administration', $administracion);
    }
    public function infoConsortium($id){

        $consortium1 = (array) DB::connection('pgsql')->select('select * from consortia where id = '. $id);

        $consortium = (array) $consortium1[0];


        return view('moreInfo')->with('consortium', $consortium);
    }
}
