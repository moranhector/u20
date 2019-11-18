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
                <h4 class="mt-5 mb-5">Stocks</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('stocks.stock.create') }}" class="btn btn-success" title="Crear nuevo Stock">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($stocks) == 0)
            <div class="panel-body text-center">
                <h4>No hay Stocks Disponibles.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Stock Id</th>                        
                            <th>Articulo</th>
                            <th>Descripción</th>
                            <th>Deposito</th>
                            <th>Stock</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($stocks as $stock)
                        <tr>
                            <td>{{ $stock->id }}</td>
                            <td>{{ $stock->articulo }}</td>
                            <td>{{ $stock->descrip }}</td>
                            <td>{{ $stock->nombre }}</td>
                            <td>{{ $stock->stock }}</td>

                            <td>

                                <form method="POST" action="{!! route('stocks.stock.destroy', $stock->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('stocks.stock.show', $stock->id ) }}" class="btn btn-info" title="Mostrar Stock">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('stocks.stock.edit', $stock->id ) }}" class="btn btn-primary" title="Editar Stock">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Borrar Stock" onclick="return confirm(&quot;Click Ok para borrar Stock.&quot;)">
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
            {!! $stocks->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection