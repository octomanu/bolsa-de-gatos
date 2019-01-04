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
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data['administrations'] as $whitelist)
                                            @if( $whitelist['days_of_debt'] >= 60)
                                                <tr style="color: #f00">
                                                    <th scope="row">{{ $whitelist['id'] }}</th>
                                                    <td>{{ $whitelist['name'] }}</td>
                                                    <td><a href="{{ $whitelist['link_intiza'] }}" class="btn btn-info" target="_blank">Intiza</a></td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <th scope="row">{{ $whitelist['id'] }}</th>
                                                    <td>{{ $whitelist['name'] }}</td>
                                                    <td><a href="{{ $whitelist['link_intiza'] }}" class="btn btn-info" target="_blank">Intiza</a></td>
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
                                                <td><a href="{{ $blocked['link_intiza'] }}" class="btn btn-info" target="_blank">Intiza</a></td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
