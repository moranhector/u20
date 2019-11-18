@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Detalles</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('detalles.detalle.create') }}" class="btn btn-success" title="Crear nuevo Detalle">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($detalles) == 0)
            <div class="panel-body text-center">
                <h4>No hay Detalles Disponibles.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Detalle</th>
                            <th>Id Articulo</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Importe</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($detalles as $detalle)
                        <tr>
                            <td>{{ $detalle->descrip }}</td>
                            <td>{{ $detalle->id_articulo }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>{{ $detalle->precio }}</td>
                            <td>{{ $detalle->importe }}</td>

                            <td>

                                <form method="POST" action="{!! route('detalles.detalle.destroy', $detalle->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('detalles.detalle.show', $detalle->id ) }}" class="btn btn-info" title="Mostrar Detalle">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('detalles.detalle.edit', $detalle->id ) }}" class="btn btn-primary" title="Editar Detalle">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Borrar Detalle" onclick="return confirm(&quot;Click Ok para borrar Detalle.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $detalles->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection