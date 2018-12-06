<?php use App\Http\Controllers\AdministrationsDeblockController;?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Whitelist</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif     
                </div>   
                 <div class="panel-body">
                     <form class="form-horizontal" method="POST" action="{{ route('deblock') }}">
                         {{ csrf_field() }}

                         <div class="form-group{{ $errors->has('administrationID') ? ' has-error' : '' }}">
                            @foreach ( $administrations as $administration)
                                <div class="col-md-6">
                                    <div class="panel-heading">IN</div>
                                    <ul>
                                                                             
                                        @if(AdministrationsDeblockController::isInWhitelist($administration['id']))
                                            <li><a href="/whitelist/{{$administration['id']}}">{{$administration['id'] . '-' . $administration['name'] }}</a></li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel-heading">OUT</div>
                                    <ul>                                           
                                        @if(!AdministrationsDeblockController::isInWhitelist($administration['id']))
                                                <li><a href="/whitelist/{{$administration['id']}}">{{$administration['id'] . '-' . $administration['name'] }}</a></li>
                                        @endif    
                                    </ul>
                                </div>
                             @endforeach
                         </div>
                     </form>
            </div>
        </div>
    </div>
</div>
@endsection
