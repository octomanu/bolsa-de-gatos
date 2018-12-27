<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RemitoController extends Controller
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
    public function listadosAdministraciones(){

        //dd(DB::connection('sqlite')->select('select * from logs'));
        //$users = DB::connection('pgsql')->select('select * from administrations where unregistered_payment = true order by id');

        $administration = DB::connection('pgsql')->select('select * from administrations');


        $administrations = [];

        foreach ($administration as $admin) {
            $administrations[] = (array)$admin;
        }

        return view('listAdministrations')->with('administrations', $administrations);
    }

    public function armarRemito($id){

        $administrationSearch = DB::connection('pgsql')->select('select * from administrations where id = '.$id);

        $administration = (array)$administrationSearch[0];

        $consortiums = DB::connection('pgsql')->select('select * from consortia where administration_id = '.$id);

        $consortiumsOfAdmin = [];

        foreach ($consortiums as $consortium) {
            $consortiumsOfAdmin[] = (array)$consortium;
        }

        $data = ['administration' => $administration, 'consortiums' => $consortiumsOfAdmin];

        return view('formRemito')->with('data', $data);
    }

    public function excelRemito(Request $request){
        dd($request);
    }

}
