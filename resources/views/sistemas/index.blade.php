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
                <h4 class="mt-5 mb-5">Sistemas</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('sistemas.sistema.create') }}" class="btn btn-success" title="Crear nuevo Sistema">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($sistemas) == 0)
            <div class="panel-body text-center">
                <h4>No hay Sistemas Disponibles.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Propietario</th>
                            <th>CUIT</th>
                            <th>Responsabilidad frente IVA</th>
                            <th>Depósito por Defecto</th>
                            <th>Actualiza Stock</th>
                            <th>Teléfono</th>
                            <th>E-mail</th>
                            <th>Domicilio</th>
                            <th>Ingresos Brutos</th>
                            <th>Fecha Inicio</th>
                            <th>Sitio</th>
                            <th>Logo</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($sistemas as $sistema)
                        <tr>
                            <td>{{ $sistema->propietario }}</td>
                            <td>{{ $sistema->cuit }}</td>
                            <td>{{ $sistema->condiva }}</td>
                            <td>{{ $sistema->deposito }}</td>
                            <td>{{ $sistema->actualiza_stock }}</td>
                            <td>{{ $sistema->telefono }}</td>
                            <td>{{ $sistema->email }}</td>
                            <td>{{ $sistema->domicilio }}</td>
                            <td>{{ $sistema->ingresos_brutos }}</td>
                            <td>{{ $sistema->fecha_inicio }}</td>
                            <td>{{ $sistema->sitio }}</td>
                            <td>{{ $sistema->logo }}</td>

                            <td>

                                <form method="POST" action="{!! route('sistemas.sistema.destroy', $sistema->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('sistemas.sistema.show', $sistema->id ) }}" class="btn btn-info" title="Mostrar Sistema">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('sistemas.sistema.edit', $sistema->id ) }}" class="btn btn-primary" title="Editar Sistema">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Borrar Sistema" onclick="return confirm(&quot;Click Ok para borrar Sistema.&quot;)">
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
            {!! $sistemas->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection