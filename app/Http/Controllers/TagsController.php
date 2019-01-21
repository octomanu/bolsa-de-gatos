<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
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
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function printTags($id){

        $consortia = DB::connection('pgsql')->select('SELECT * FROM consortia where id = '. $id);

        $consortium = (array) $consortia[0];

        $functionalUnits = DB::connection('pgsql')->select('SELECT * FROM functional_units WHERE administrable_id = '. $id);

        $contacts = [];
        foreach ($functionalUnits as $fu){
            $fu1 = (array) $fu;
            if ($fu1['primary_contact']){
                $busqueda = (array) DB::connection('pgsql')->select('SELECT * FROM contacts WHERE id = ' . $fu1['primary_contact'] . ' AND send_expensed_mail = true');
                if(array_key_exists(0, $busqueda)){
                    $contacts[] = (array) $busqueda[0];
                }
            } else {
                $busqueda = (array) DB::connection('pgsql')->select('SELECT * FROM contacts WHERE functional_unit_id = ' . $fu1['id'] . ' AND send_expensed_mail = true AND contact_role_id = 1');
                if(array_key_exists(0, $busqueda)){
                    $contacts[] = (array) $busqueda[0];
                }
            }
        }

        return view('templates.tags')->with(['consortium' => $consortium, 'contacts' => $contacts]);
    }
}
