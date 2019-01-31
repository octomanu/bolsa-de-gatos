@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Expensas</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="panel-body">
                        <ul>
                            @foreach ( $expenses as $expense)
                                <?php $consortia = \App\Http\Controllers\ExpensesController::consortiaNameById($expense['administrable_id']);
                                ?>
                                <li class="d-flex justify-content-between align-items-center">{{$expense['id'] . '-' . $consortia  }}<a class="btn btn-info pull-right" href="/expensas/{{ $expense['id'] }}">Imprimir notas y banco</a></li>
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
