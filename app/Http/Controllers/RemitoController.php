<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\IReader;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RemitoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:remito');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function listadosAdministraciones(){

        //dd(DB::connection('sqlite')->select('select * from logs'));
        //$users = DB::connection('pgsql')->select('select * from administrations where unregistered_payment = true order by id');

        $administration = DB::connection('pgsql')->select('select * from administrations ORDER BY name');


        $administrations = [];

        foreach ($administration as $admin) {
            $administrations[] = (array)$admin;
        }

        return view('listAdministrations')->with('administrations', $administrations);
    }

    public function armarRemito($id){

        $administrationSearch = DB::connection('pgsql')->select('select * from administrations where id = '.$id );

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


        $inputFileName = 'remitoTemplate.xlsx';

        $file = 'remito' . $request->input('name');

        $reader =  IOFactory::createReader("Xlsx");

        $spreadsheet = $reader->load($inputFileName);

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        $sheet = $spreadsheet->getActiveSheet();

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $file . '.xlsx"'); /*-- $filename is  xsl filename ---*/
        header('Cache-Control: max-age=0');

        $sheet->setCellValue('D3', $request->input('id_administration'));
        $sheet->setCellValue('D4', $request->input('id_administration'));
        $sheet->setCellValue('D5', $request->input('address'));
        $sheet->setCellValue('D6', $request->input('responsible'));
        $sheet->setCellValue('D7', $request->input('phone'));


        foreach ($request->input('typeDelivery') as $type) {
            if ($type == 'salary') {
                $sheet->setCellValue('B9', 'SUELDOS  X');
            }
            if ($type == 'expenses') {
                $sheet->setCellValue('C9', 'EXPENSAS  X');
            }
            if ($type == 'salaryExpenses') {
                $sheet->setCellValue('D9', 'SUELDOS Y EXPENSAS  X');
            }
            if ($type == 'invoices') {
                $sheet->setCellValue('E9', 'FACTURAS  X');
            }
            if ($type == 'another') {
                $sheet->setCellValue('F9', 'OTROS  X');
            }

        }
        for ($i = 0; $i < count($request->input('expenses')); $i++) {
            $sheet->setCellValue('C'.(12 + $i), $request->input('expenses')[$i]);
        }

        for ($i = 0; $i < count($request->input('salary')); $i++) {
            $sheet->setCellValue('D'.(12 + $i), $request->input('salary')[$i]);
        }

        if ($request->input('social')) {
            $sheet->setCellValue('E12', 'TODAS');
        } else {
            $sheet->setCellValue('E12', 'NO');
        }

        if ($request->input('date')) {
            $sheet->setCellValue('D48', $request->input('date'));
        }
        if ($request->input('recieve')) {
            $sheet->setCellValue('C49', $request->input('recieve'));
        }

        $writer->save('php://output', 'xlsx');

    }

    public function printRemito(Request $request){
        $data = [];
        $data['id_administracion'] = $request->input('id_administration');
        $data['name'] = $request->input('name');
        $data['address'] = $request->input('address');
        $data['responsible'] = $request->input('responsible');
        $data['phone'] = $request->input('phone');
        $data['typeDelivery'] = $request->input('typeDelivery');
        $data['expenses'] = $request->input('expenses');
        $data['salary'] = $request->input('salary');
        $data['date'] = $request->input('date');
        $data['recieve'] = $request->input('recieve');
        $data['social'] = $request->input('social');

        return view('templates.remito')->with('data', $data);
    }

}
