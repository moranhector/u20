@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Detalle' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('detalles.detalle.destroy', $detalle->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('detalles.detalle.index') }}" class="btn btn-primary" title="Mostrar Detalle">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('detalles.detalle.create') }}" class="btn btn-success" title="Crear nuevo Detalle">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('detalles.detalle.edit', $detalle->id ) }}" class="btn btn-primary" title="Editar Detalle">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Borrar Detalle" onclick="return confirm(&quot;Click Ok para borrar Detalle.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Detalle</dt>
            <dd>{{ $detalle->descrip }}</dd>
            <dt>Id Articulo</dt>
            <dd>{{ $detalle->id_articulo }}</dd>
            <dt>Cantidad</dt>
            <dd>{{ $detalle->cantidad }}</dd>
            <dt>Precio</dt>
            <dd>{{ $detalle->precio }}</dd>
            <dt>Importe</dt>
            <dd>{{ $detalle->importe }}</dd>

        </dl>

    </div>
</div>

@endsection