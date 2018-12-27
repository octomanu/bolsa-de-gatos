@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Administraciones</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                 <div class="panel-body">
                     <div class="form-group{{ $errors->has('administrationID') ? ' has-error' : '' }}">
                         <ul>
                             @foreach ( $administrations as $administration)
                                 <li class="d-flex justify-content-between align-items-center">{{$administration['id'] . '-' . $administration['name'] }} <a class="btn btn-info pull-right" href="/remito/{{$administration['id']}}">Armar Remito</a></li>
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
