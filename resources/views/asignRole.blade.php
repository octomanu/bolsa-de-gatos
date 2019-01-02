@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Role</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('usuarios') }}">
                            {{ csrf_field() }}

                                <div class="col-md-6">
                                    <div class="panel-heading">Roles</div>
                                    <ul>
                                        @foreach ( $data['user']->roles as $role)
                                            <li>{{ $role->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel-heading">Roles a asignar</div>
                                    <ul>
                                        @foreach ( $data['rest'] as $rest)
                                                <li><a href="/roles/{{ $data['user']->id }}/asignar/{{$rest->id }}"> {{ $rest->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
