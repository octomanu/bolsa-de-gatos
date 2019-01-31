@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if(isset($administration))
                        <div class="panel-heading">{{ $administration['name'] }}</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">ID</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $administration['id'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Nombre Ejecutivo</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $administration['business_name'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Dirección</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $administration['address'] . ', ' . $administration['location'] . ', ' . $administration['province'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Codigo Postal</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $administration['postal_code'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Email</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $administration['email'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Cuit</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $administration['cuit'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Teléfono</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $administration['phone'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Situación Fiscal</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $administration['fiscal_situation'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Responsable</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $administration['responsible'] }}
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Bloqueado</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    @if($administration['unregistered_payment'])
                                        Si
                                    @else
                                        No
                                    @endif
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Whitelist</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    @if($administration['whitelist'])
                                        Si
                                    @else
                                        No
                                    @endif
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Activo</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    @if($administration['active'])
                                        Si
                                    @else
                                        No
                                    @endif
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Días de deuda</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $administration['days_of_debt'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Expensas</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    <a href="/mostrar-expensas/{{ $administration['id'] }}" class="btn btn-primary">Mostrar Expensas</a>
                                </div>
                            </div>
                            <hr />
                        </div>
                    @else
                        <div class="panel-heading">{{ $consortium['fancy_name'] }}</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">ID</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $consortium['id'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Código</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $consortium['code'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Administración</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ \App\Http\Controllers\ReportController::administrationNameById($consortium['administration_id'])['name'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Nombre Ejecutivo</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $consortium['business_name'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Dirección</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $consortium['address'] . ', ' . $consortium['location'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Codigo Postal</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $consortium['postal_code'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Cuit</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $consortium['cuit'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Fecha de inicio</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $consortium['start_date'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Liquidación</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $consortium['liquidation'] }}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Notas</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    {{ $consortium['notes'] }}
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-sm-3 col-md-2 col-5">
                                    <label style="font-weight:bold;">Facturación automatica</label>
                                </div>
                                <div class="col-md-8 col-6">
                                    @if($consortium['auto_billing'])
                                        Si
                                    @else
                                        No
                                    @endif
                                </div>
                            </div>
                            <hr />
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
