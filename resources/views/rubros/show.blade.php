@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($rubro->name) ? $rubro->name : 'Rubro' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('rubros.rubro.destroy', $rubro->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('rubros.rubro.index') }}" class="btn btn-primary" title="Mostrar Rubro">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('rubros.rubro.create') }}" class="btn btn-success" title="Crear nuevo Rubro">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('rubros.rubro.edit', $rubro->id ) }}" class="btn btn-primary" title="Editar Rubro">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Borrar Rubro" onclick="return confirm(&quot;Click Ok para borrar Rubro.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $rubro->name }}</dd>

        </dl>

    </div>
</div>

@endsection