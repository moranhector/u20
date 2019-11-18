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
                <h4 class="mt-5 mb-5">Puntos de venta</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('puntoventas.puntoventa.create') }}" class="btn btn-success" title="Crear nuevo Punto de venta">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($puntoventas) == 0)
            <div class="panel-body text-center">
                <h4>No hay Puntos de venta disponibles.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Nombre de Fantasía</th>
                            <th>Número</th>
                            <th>Sistema</th>
                            <th>Domicilio</th>
                            <!-- <th>Fecha Desde</th> -->
                            <th>Habilitado</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($puntoventas as $puntoventa)
                        <tr>
                            <td>{{ $puntoventa->nombre }}</td>
                            <td>{{ $puntoventa->numero }}</td>
                            <td>{{ $puntoventa->sistema }}</td>
                            <td>{{ $puntoventa->domicilio }}</td>
                            <!-- <td> $puntoventa->fechadesde </td> -->
                            <td>{{ ($puntoventa->habilitado) ? 'Si' : 'No' }}</td>

                            <td>

                                <form method="POST" action="{!! route('puntoventas.puntoventa.destroy', $puntoventa->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('puntoventas.puntoventa.show', $puntoventa->id ) }}" class="btn btn-info" title="Mostrar Puntoventa">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('puntoventas.puntoventa.edit', $puntoventa->id ) }}" class="btn btn-primary" title="Editar Puntoventa">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Borrar Puntoventa" onclick="return confirm(&quot;Click Ok para borrar Puntoventa.&quot;)">
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
            {!! $puntoventas->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection