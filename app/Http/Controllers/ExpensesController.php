<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpensesController extends Controller
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

    public function showExpenses($id){

        $expenses = DB::connection('pgsql')->select("select e.* from expenses e left join consortia c on e.administrable_id = c.id where c.administration_id = ". $id . " AND e.status = 'printed'");

        $expenses1 = [];

        foreach($expenses as $admin){
            $expenses1[] = (array) $admin;
        }

        return view('expenses')->with('expenses', $expenses1);
    }
    public static function consortiaNameById($id){
        $name = DB::connection('pgsql')->select ('select * from consortia where id = '. $id);

        return ((array) $name[0])['address'];
    }

    public function formExpense($id){
        $notas = DB::connection('pgsql')->select('select * from expense_notes where expense_id = '. $id);

        $bank = DB::connection('pgsql')->select('select * from expense_payment_methods epm inner join expense_payment_method_sections epms on epm.expense_payment_method_section_id = epms.id where epms.expense_id = '. $id);

        $notes1 = [];

        foreach($notas as $admin){
            $notes1[] = (array) $admin;
        }
        $bank1 = [];

        foreach($bank as $admin){
            $bank1[] = (array) $admin;
        }

        return view('formExpense')->with('data', ['notes' => $notes1, 'bank' =>$bank1]);
    }
    public function notesAndBank(Request $request, $id){
        $notes = implode(',' , $request->input('notes'));
        $banks = implode(',', $request->input('bank'));

        $notas = DB::connection('pgsql')->select('select * from expense_notes where expense_id = '. $id . ' AND id in (' . $notes . ')');

        $bank = DB::connection('pgsql')->select('select epm.* from expense_payment_methods epm where epm.id in (' . $banks . ')');

        $notes1 = [];

        foreach($notas as $admin){
            $notes1[] = (array) $admin;
        }
        $bank1 = [];

        foreach($bank as $admin){
            $bank1[] = (array) $admin;
        }

        $administration =  (array) DB::connection('pgsql')->select('select * from administrations inner join consortia c2 ON administrations.id = c2.administration_id INNER join expenses on c2.id = expenses.administrable_id where expenses.id = ' . $id );

        $adminId = ((array) $administration[0])['id'];


        return view('templates.notesAndBank')->with('data', [$notes1, $bank1, $adminId]);
    }
}
