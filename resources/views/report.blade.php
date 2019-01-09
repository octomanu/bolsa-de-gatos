@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Whitelist</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Bloqueados</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">A punto de bloquear</a></li>
                            <li role="presentation"><a href="#active" aria-controls="messages" role="tab" data-toggle="tab">Consorcios Activos</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre Administracion</th>
                                            <th scope="col">Link</th>
                                            <th scope="col">Motivo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data['administrations'] as $whitelist)
                                            @if( $whitelist['days_of_debt'] >= 60)
                                                <tr style="color: #f00">
                                                    <th scope="row">{{ $whitelist['id'] }}</th>
                                                    <td>{{ $whitelist['name'] }}</td>
                                                    <td><a href="{{ $whitelist['link_intiza'] }}" class="btn btn-info" target="_blank">Intiza</a></td>
                                                    <td>
                                                        @if(\App\Http\Controllers\AdministrationsDeblockController::getWhitelistReason($whitelist['id']))
                                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm{{$whitelist['id']}}" data-whatever="@mdo" style="border: none;"><i class="fas fa-eye"></i></button>

                                                            <div class="modal fade bs-example-modal-sm{{$whitelist['id']}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                                <div class="modal-dialog modal-sm" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title" id="gridSystemModalLabel">Razón</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <p>{{\App\Http\Controllers\AdministrationsDeblockController::getWhitelistReason($whitelist['id'])}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <th scope="row">{{ $whitelist['id'] }}</th>
                                                    <td>{{ $whitelist['name'] }}</td>
                                                    <td><a href="{{ $whitelist['link_intiza'] }}" class="btn btn-info" target="_blank">Intiza</a></td>
                                                    <td>
                                                        @if(\App\Http\Controllers\AdministrationsDeblockController::getWhitelistReason($whitelist['id']))
                                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm{{$whitelist['id']}}" data-whatever="@mdo" style="border: none;"><i class="fas fa-eye"></i></button>

                                                            <div class="modal fade bs-example-modal-sm{{$whitelist['id']}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                                <div class="modal-dialog modal-sm" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title" id="gridSystemModalLabel">Razón</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <p>{{\App\Http\Controllers\AdministrationsDeblockController::getWhitelistReason($whitelist['id'])}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre Administracion</th>
                                            <th scope="col">Link</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data['blocked'] as $blocked)
                                            <tr>
                                                <th scope="row">{{ $blocked['id'] }}</th>
                                                <td>{{ $blocked['name'] }}</td>
                                                @if($blocked['link_intiza'])
                                                    <td><a href="{{ $blocked['link_intiza'] }}" class="btn btn-info" target="_blank">Intiza</a></td>
                                                @else
                                                    <td><a href="{{ $blocked['link_intiza'] }}" class="btn btn-default disabled" target="_blank" disabled="">Intiza</a></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">
                                <div class="panel-body">
                                    <table  class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre Administracion</th>
                                            <th scope="col">Días para bloqueo</th>
                                            <th scope="col">Link</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data['almost'] as $almost)
                                            <tr>
                                                <th scope="row">{{ $almost['id'] }}</th>
                                                <td>{{ $almost['name'] }}</td>
                                                <td>{{ 60 - $almost['days_of_debt'] }}</td>
                                                <td><a href="{{ $almost['link_intiza'] }}" class="btn btn-info" target="_blank">Intiza</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="active">
                                <div class="panel-body">
                                    <table  class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Direccion Edificio</th>
                                            <th scope="col">Consorcio</th>
                                            <th scope="col">Administración</th>
                                            <th scope="col">CUIT</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data['active'] as $active)
                                            <tr>
                                                <th scope="row">{{ $active['id'] }}</th>
                                                <td>{{ $active['address'] }}, {{ $active['location'] }}</td>
                                                <td>{{ $active['fancy_name'] }}</td>
                                                <td>{{ \App\Http\Controllers\ReportController::administrationNameById($active['administration_id'])}}</td>
                                                <td>{{ $active['cuit'] }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
