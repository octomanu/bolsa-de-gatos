@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuarios</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="panel-body">
                            <ul>
                                @foreach ( $users as $user)
                                    <li class="d-flex justify-content-between align-items-center">{{$user['id'] . '-' . $user['name'] }}<a class="btn btn-info pull-right" href="/roles/{{$user['id']}}">Asignar Roles</a></li>
                                    <hr>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
