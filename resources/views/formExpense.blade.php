
@extends('layouts.app')

@section('content')
    <?php
    $notes = $data['notes'];
    $bank = $data['bank'];

    ?>
    <style>
        table {
            border-collapse: collapse !important;
        }

        table, th, td {
            border: 1px solid black !important;
            padding: 3px !important;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Datos Expensas</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="">
                            {{ csrf_field() }}


                            <label for="id_administration" class="col-md-4 control-label">Note desctiption: </label>
                                <div class="form-group">

                                    <div class="col-md-6">
                                        @foreach($notes as $note)
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="notes[]" value="{{$note['id']}}" checked>{!! $note['description'] !!}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            <hr>

                            <label for="id_administration" class="col-md-3 control-label">Bank desctiption: </label>

                                <div class="form-group">

                                    <div class="col-md-7">
                                        @foreach($bank as $ban)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="bank[]" value="{{$ban['id']}}" checked>
                                                    <table class="table-bordered table">
                                                        <tr>
                                                            <td><strong>TITULAR: </strong>{{$ban['bank_branch']}}</td>
                                                            <td><strong>BANCO: </strong>{{$ban['bank_name']}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>CBU: </strong>{{$ban['cbu']}}</td>
                                                            <td><strong>SUCURSAL: </strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>ALIAS: </strong>{{$ban['alias']}}</td>
                                                            <td><strong>CODIGO DE PAGO ELECTRONICO: </strong>{{$ban['electronic_payment_code']}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>NRo. DE CUENTA: </strong>{{$ban['account_number']}}</td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Imprimir otas y banco</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
