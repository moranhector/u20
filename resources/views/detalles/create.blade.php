@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
                <h4 class="mt-5 mb-5">Crear nuevo Detalle</h4>
            </span>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('detalles.detalle.index') }}" class="btn btn-primary" title="Mostrar Detalle">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('detalles.detalle.store') }}" accept-charset="UTF-8" id="create_detalle_form" name="create_detalle_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('detalles.form', [
                                        'detalle' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Agregar">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


