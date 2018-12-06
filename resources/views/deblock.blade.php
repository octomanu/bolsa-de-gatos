@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Desbloquear</div>
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
                             <label for="administrationID" class="col-md-4 control-label">N° Administración</label>

                             <div class="col-md-6">
                                 <select name="administrationID[]" size="5" multiple class="form-control" value="{{ old('administrationID') }}" required autofocus>
                                        @foreach ($administrations as $administration)
                                            <option value="{{ $administration['id']}}">{{ $administration['id']}} - {{ $administration['name']}}</option>
                                        @endforeach
                                        
                                </select>

                                 @if ($errors->has('administrationID'))
                                     <span class="help-block">
                                         <strong>{{ $errors->first('administrationID') }}</strong>
                                     </span>
                                 @endif
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-8 col-md-offset-4">
                                 <button type="submit" class="btn btn-primary">
                                     Desbloquear
                                 </button>
                             </div>
                         </div>
                     </form>
            </div>
        </div>
    </div>
</div>
@endsection
