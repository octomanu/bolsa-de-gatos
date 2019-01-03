@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Whitelist</div>
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
                            @foreach($data['administrations'] as $whitelist)
                                <tr>
                                    <th scope="row">{{ $whitelist['id'] }}</th>
                                    <td>{{ $whitelist['name'] }}</td>
                                    <td><a href="{{ $whitelist['link_intiza'] }}" class="btn btn-info" target="_blank">Intiza</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-heading">Bloqueados</div>
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
                                    <td><a href="{{ $blocked['link_intiza'] }}" class="btn btn-info" target="_blank">Intiza</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-heading">Por estar bloqueados</div>
                    <div class="panel-body">
                        <table  class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre Administracion</th>
                                <th scope="col">Días</th>
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
            </div>
        </div>
    </div>
    </div>
@endsection
