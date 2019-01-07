@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Buscar</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('report') }}">
                            {{ csrf_field() }}
                            <div class="form-group" style="display: flex; justify-content: space-between;">
                                <label class="radio-inline">
                                    <input type="radio" name="por" id="" value="administration" checked> Por Administración
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="por" id="" value="consortium"> Por Edificio
                                </label>
                            </div>
                            <div class="col-9">
                                <label for="">Name</label>
                                <input type="text" class="form-control" id=""  name="name" placeholder="Nombre">
                            </div>
                            <div class="form-group" style="display: flex; justify-content: center;">
                                <label for="">
                                    <input type="checkbox" class="" id="" name="manual_billing"> Facturación Manual
                                 </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Buscar</button>
                        </form>
                    </div>

                    @if(isset($data))
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Link</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $datos)
                                    @if(isset($datos['name']))
                                        <tr>
                                            <th scope="row">{{ $datos['id'] }}</th>
                                            <td>{{ $datos['name'] }}</td>
                                            <td><a href="/administracion/{{ $datos['id'] }}" class="btn btn-success">Más info</a></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <th scope="row">{{ $datos['id'] }}</th>
                                            <td>{{ $datos['business_name'] }}</td>
                                            <td><a href="/consorcio/{{ $datos['id'] }}" class="btn btn-success">Más info</a></td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
@endsection
