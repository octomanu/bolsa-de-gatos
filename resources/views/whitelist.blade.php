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
                         <div class="form-group{{ $errors->has('administrationID') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <div class="panel-heading">IN the whitelist</div>
                                    <ul>
                                        @foreach ( $administrations as $administration)
                                                                             
                                            @if(AdministrationsDeblockController::isInWhitelist($administration['id']))
                                                <li><a href="/whitelist/{{$administration['id']}}">{{$administration['id'] . '-' . $administration['name'] }}</a>
                                                    @if(AdministrationsDeblockController::getWhitelistReason($administration['id']))
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="@mdo" style="border: none;"><i class="fas fa-eye"></i></button>

                                                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title" id="gridSystemModalLabel">Razón</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <p>{{AdministrationsDeblockController::getWhitelistReason($administration['id'])}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo" style="border: none;"><i class="fas fa-edit"></i></button>

                                                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding: 50px;">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title" id="exampleModalLabel">Razón</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form  method="POST" action="{{ route('saveNoteWhitelist') }}">
                                                                            {{ csrf_field() }}
                                                                            <div class="form-group">
                                                                                <input type="hidden" name="admin" value="{{$administration['id']}}">
                                                                                <label for="message-text" class="control-label">Message:</label>
                                                                                <textarea class="form-control" id="message-text" name="reason"></textarea>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Send message</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel-heading">OUT of whitelist</div>
                                    <ul>
                                        @foreach ( $administrations as $administration)
                                            @if(!AdministrationsDeblockController::isInWhitelist($administration['id']))
                                                    <li><a href="/whitelist/{{$administration['id']}}">{{$administration['id'] . '-' . $administration['name'] }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                         </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
