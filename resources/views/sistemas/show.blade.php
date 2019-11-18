@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Sistema' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('sistemas.sistema.destroy', $sistema->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('sistemas.sistema.index') }}" class="btn btn-primary" title="Mostrar Sistema">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sistemas.sistema.create') }}" class="btn btn-success" title="Crear nuevo Sistema">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('sistemas.sistema.edit', $sistema->id ) }}" class="btn btn-primary" title="Editar Sistema">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Borrar Sistema" onclick="return confirm(&quot;Click Ok para borrar Sistema.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Propietario</dt>
            <dd>{{ $sistema->propietario }}</dd>
            <dt>CUIT</dt>
            <dd>{{ $sistema->cuit }}</dd>
            <dt>Responsabilidad frente IVA</dt>
            <dd>{{ $sistema->condiva }}</dd>
            <dt>Depósito por Defecto</dt>
            <dd>{{ $sistema->deposito }}</dd>
            <dt>Actualiza Stock</dt>
            <dd>{{ $sistema->actualiza_stock }}</dd>
            <dt>Teléfono</dt>
            <dd>{{ $sistema->telefono }}</dd>
            <dt>E-mail</dt>
            <dd>{{ $sistema->email }}</dd>
            <dt>Domicilio</dt>
            <dd>{{ $sistema->domicilio }}</dd>
            <dt>Ingresos Brutos</dt>
            <dd>{{ $sistema->ingresos_brutos }}</dd>
            <dt>Fecha Inicio</dt>
            <dd>{{ $sistema->fecha_inicio }}</dd>
            <dt>Sitio</dt>
            <dd>{{ $sistema->sitio }}</dd>
            <dt>Logo</dt>
            <dd>{{ $sistema->logo }}</dd>

        </dl>

    </div>
</div>

@endsection