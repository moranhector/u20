@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Deposito' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('depositos.deposito.destroy', $deposito->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('depositos.deposito.index') }}" class="btn btn-primary" title="Mostrar Deposito">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('depositos.deposito.create') }}" class="btn btn-success" title="Crear nuevo Deposito">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('depositos.deposito.edit', $deposito->id ) }}" class="btn btn-primary" title="Editar Deposito">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Borrar Deposito" onclick="return confirm(&quot;Click Ok para borrar Deposito.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nombre</dt>
            <dd>{{ $deposito->nombre }}</dd>

        </dl>

    </div>
</div>

@endsection