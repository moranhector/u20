@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Factura' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('facturas.factura.destroy', $factura->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('facturas.factura.index') }}" class="btn btn-primary" title="Mostrar Factura">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('facturas.factura.create') }}" class="btn btn-success" title="Crear nuevo Factura">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('facturas.factura.edit', $factura->id ) }}" class="btn btn-primary" title="Editar Factura">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Borrar Factura" onclick="return confirm(&quot;Click Ok para borrar Factura.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nombre del Cliente</dt>
            <dd>{{ $factura->nombre }}</dd>
            <dt>Tipo</dt>
            <dd>{{ $factura->tipo }}</dd>
            <dt>Punto de Venta</dt>
            <dd>{{ $factura->ptovta }}</dd>
            <dt>Número Fac.</dt>
            <dd>{{ $factura->nrocomp }}</dd>
            <dt>Cuit</dt>
            <dd>{{ $factura->cuit }}</dd>
            <dt>Importe Total</dt>
            <dd>{{ $factura->imptot }}</dd>
            <dt>Importe IVA</dt>
            <dd>{{ $factura->impiva }}</dd>
            <dt>Fecha</dt>
            <dd>{{ $factura->fecha }}</dd>

        </dl>

    </div>
</div>

@endsection