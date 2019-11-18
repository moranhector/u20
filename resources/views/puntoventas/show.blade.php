@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Puntoventa' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('puntoventas.puntoventa.destroy', $puntoventa->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('puntoventas.puntoventa.index') }}" class="btn btn-primary" title="Mostrar Puntoventa">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('puntoventas.puntoventa.create') }}" class="btn btn-success" title="Crear nuevo Puntoventa">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('puntoventas.puntoventa.edit', $puntoventa->id ) }}" class="btn btn-primary" title="Editar Puntoventa">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Borrar Puntoventa" onclick="return confirm(&quot;Click Ok para borrar Puntoventa.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nombre de Fantasía</dt>
            <dd>{{ $puntoventa->nombre }}</dd>
            <dt>Número</dt>
            <dd>{{ $puntoventa->numero }}</dd>
            <dt>Sistema</dt>
            <dd>{{ $puntoventa->sistema }}</dd>
            <dt>Domicilio</dt>
            <dd>{{ $puntoventa->domicilio }}</dd>
            <dt>Fecha Desde</dt>
            <dd>{{ $puntoventa->fechadesde }}</dd>
            <dt>Habilitado</dt>
            <dd>{{ ($puntoventa->habilitado) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection