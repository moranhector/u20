@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Cliente' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('clientes.cliente.destroy', $cliente->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('clientes.cliente.index') }}" class="btn btn-primary" title="Mostrar Cliente">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('clientes.cliente.create') }}" class="btn btn-success" title="Crear nuevo Cliente">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('clientes.cliente.edit', $cliente->id ) }}" class="btn btn-primary" title="Editar Cliente">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Borrar Cliente" onclick="return confirm(&quot;Click Ok para borrar Cliente.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nombre</dt>
            <dd>{{ $cliente->nombre }}</dd>
            <dt>CUIT</dt>
            <dd>{{ $cliente->cuit }}</dd>
            <dt>Iva Cond</dt>
            <dd>{{ $cliente->iva_cond }}</dd>
            <dt>Domicilio</dt>
            <dd>{{ $cliente->domicilio }}</dd>
            <dt>Telefono</dt>
            <dd>{{ $cliente->telefono }}</dd>
            <dt>Email</dt>
            <dd>{{ $cliente->email }}</dd>

        </dl>

    </div>
</div>

@endsection