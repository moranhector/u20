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
                <h4 class="mt-5 mb-5">Articulos</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('articulos.articulo.create') }}" class="btn btn-success" title="Crear nuevo Articulo">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($articulos) == 0)
            <div class="panel-body text-center">
                <h4>No hay Articulos Disponibles.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped " >
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th>Ean13</th>
                            <th>Código</th>                            
                            <th>Id Rubro</th>
                            <th>Precio</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($articulos as $articulo)
                        <tr>
                            <td>{{ $articulo->descrip }}</td>
                            <td>{{ $articulo->ean13 }}</td>
                            <td>{{ $articulo->codigo }}</td>                            
                            <td>{{ $articulo->id_rubro }}</td>
                            <td>{{ $articulo->precio }}</td>

                            <td>

                                <form method="POST" action="{!! route('articulos.articulo.destroy', $articulo->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('articulos.articulo.show', $articulo->id ) }}" class="btn btn-info" title="Mostrar Articulo">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('articulos.articulo.edit', $articulo->id ) }}" class="btn btn-primary" title="Editar Articulo">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Borrar Articulo" onclick="return confirm(&quot;Click Ok para borrar Articulo.&quot;)">
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
            {!! $articulos->render() !!}
        </div>
        
        @endif
    
    </div>







@endsection