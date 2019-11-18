@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Lista' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('listas.lista.destroy', $lista->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('listas.lista.index') }}" class="btn btn-primary" title="Mostrar Lista">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('listas.lista.create') }}" class="btn btn-success" title="Crear nuevo Lista">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('listas.lista.edit', $lista->id ) }}" class="btn btn-primary" title="Editar Lista">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Borrar Lista" onclick="return confirm(&quot;Click Ok para borrar Lista.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Idarticulo</dt>
            <dd>{{ $lista->idarticulo }}</dd>
            <dt>Descripcion</dt>
            <dd>{{ $lista->Descripcion }}</dd>
            <dt>Rubro</dt>
            <dd>{{ $lista->rubro }}</dd>
            <dt>Precio2</dt>
            <dd>{{ $lista->precio2 }}</dd>
            <dt>Precio3</dt>
            <dd>{{ $lista->precio3 }}</dd>
            <dt>Precio4</dt>
            <dd>{{ $lista->precio4 }}</dd>
            <dt>Precio5</dt>
            <dd>{{ $lista->precio5 }}</dd>
            <dt>Costo Ult Comp</dt>
            <dd>{{ $lista->costo_ult_comp }}</dd>
            <dt>Gasto</dt>
            <dd>{{ $lista->gasto }}</dd>
            <dt>Item1</dt>
            <dd>{{ $lista->item1 }}</dd>
            <dt>Item2</dt>
            <dd>{{ $lista->item2 }}</dd>
            <dt>Item3</dt>
            <dd>{{ $lista->item3 }}</dd>
            <dt>Item4</dt>
            <dd>{{ $lista->item4 }}</dd>
            <dt>Set1</dt>
            <dd>{{ $lista->set1 }}</dd>
            <dt>Set2</dt>
            <dd>{{ $lista->set2 }}</dd>
            <dt>Set3</dt>
            <dd>{{ $lista->set3 }}</dd>
            <dt>Set4</dt>
            <dd>{{ $lista->set4 }}</dd>
            <dt>Proveedor</dt>
            <dd>{{ $lista->proveedor }}</dd>
            <dt>Artprov</dt>
            <dd>{{ $lista->artprov }}</dd>
            <dt>Stockable</dt>
            <dd>{{ $lista->stockable }}</dd>
            <dt>Marca</dt>
            <dd>{{ $lista->marca }}</dd>
            <dt>Empresa</dt>
            <dd>{{ $lista->empresa }}</dd>
            <dt>Dt Ult Cambio Precio</dt>
            <dd>{{ $lista->dtUltCambioPrecio }}</dd>
            <dt>Importado</dt>
            <dd>{{ $lista->importado }}</dd>
            <dt>Created At</dt>
            <dd>{{ $lista->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $lista->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection