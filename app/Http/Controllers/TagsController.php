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



        return view('templates.tags')->with('consortium', $consortium);
    }
}
