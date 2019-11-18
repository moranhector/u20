@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Articulo' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('articulos.articulo.destroy', $articulo->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('articulos.articulo.index') }}" class="btn btn-primary" title="Mostrar Articulo">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('articulos.articulo.create') }}" class="btn btn-success" title="Crear nuevo Articulo">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('articulos.articulo.edit', $articulo->id ) }}" class="btn btn-primary" title="Editar Articulo">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Borrar Articulo" onclick="return confirm(&quot;Click Ok para borrar Articulo.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Descripción</dt>
            <dd>{{ $articulo->descrip }}</dd>
            <dt>Ean13</dt>
            <dd>{{ $articulo->ean13 }}</dd>
            <dt>Código</dt>
            <dd>{{ $articulo->codigo }}</dd>            
            <dt>Id Rubro</dt>
            <dd>{{ $articulo->id_rubro }}</dd>
            <dt>Umedida</dt>
            <dd>{{ $articulo->umedida }}</dd>
            <dt>Precio</dt>
            <dd>{{ $articulo->precio }}</dd>

        </dl>

    </div>
</div>

@endsection