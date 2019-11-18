@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Stock' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('stocks.stock.destroy', $stock->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('stocks.stock.index') }}" class="btn btn-primary" title="Mostrar Stock">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('stocks.stock.create') }}" class="btn btn-success" title="Crear nuevo Stock">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('stocks.stock.edit', $stock->id ) }}" class="btn btn-primary" title="Editar Stock">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Borrar Stock" onclick="return confirm(&quot;Click Ok para borrar Stock.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Articulo</dt>
            <dd>{{ $stock->articulo }}</dd>
            <dt>Deposito</dt>
            <dd>{{ $stock->deposito }}</dd>
            <dt>Stock</dt>
            <dd>{{ $stock->stock }}</dd>

        </dl>

    </div>
</div>

@endsection