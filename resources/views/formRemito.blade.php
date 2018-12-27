
@extends('layouts.app')

@section('content')
    <?php
    $consortiums = $data['consortiums'];
    $administration = $data['administration'];

    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Remito (nombre administración)</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('id_administration') ? ' has-error' : '' }}">
                                <label for="id_administration" class="col-md-4 control-label">ID administracion</label>

                                <div class="col-md-6">
                                    <input id="id_administration" type="text" class="form-control" name="id_administration" value="{{ $administration['name'] }}" readonly>

                                    @if ($errors->has('id_administration'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('id_administration') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre administracion</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $administration['business_name'] }}" readonly>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">Domicilio</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ $administration['address'] }}" readonly>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('responsible') ? ' has-error' : '' }}">
                                <label for="responsible" class="col-md-4 control-label">Responsable</label>

                                <div class="col-md-6">
                                    <input id="responsible" type="text" class="form-control" name="responsible" value="{{ $administration['responsible'] }}" readonly>

                                    @if ($errors->has('responsible'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('responsible') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Número de telefono</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $administration['phone'] }}" readonly>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="typeDelivery" class="col-md-4 control-label">Tipo de entrega</label>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="typeDelivery[]"  value="salary">
                                            Sueldos
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="typeDelivery[]" value="expenses">
                                            Expensas
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="typeDelivery[]" value="salaryExpenses">
                                            Sueldos y Expensas
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="typeDelivery[]" value="invoices">
                                            Facturas
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="typeDelivery[]" value="another">
                                            Otros
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="typeDelivery" class="col-md-12">Observaciones</label>
                                <div class="form-group">
                                    <label for="typeDelivery" class="col-md-4 control-label">Expensas</label>
                                    <div class="col-md-6">
                                        @foreach($consortiums as $consortium)
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="expenses[]"  value="{{ $consortium['id'] }}">
                                                    {{ $consortium['fancy_name'] }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="typeDelivery" class="col-md-4 control-label">Sueldos</label>
                                    <div class="col-md-6">
                                        @foreach($consortiums as $consortium)
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="salary[]"  value="{{ $consortium['id'] }}">
                                                    {{ $consortium['fancy_name'] }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="typeDelivery" class="col-md-4 text-right">Cargas Sociales</label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="social"  value="true">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Armar Remito</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
