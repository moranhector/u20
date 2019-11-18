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
                <h4 class="mt-5 mb-5">Facturas</h4>
            </div>



            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ url('/facturas/preparafactura/C') }}" class="btn btn-success" title="Crear Factura C">
                   FAC C <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>            

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ url('/facturas/preparafactura/B') }}" class="btn btn-success" title="Crear Factura B">
                   FAC B <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>            

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ url('/facturas/preparafactura/A') }}" class="btn btn-success" title="Crear Factura A">
                   FAC A <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>




        </div>
        
        @if(count($facturas) == 0)
            <div class="panel-body text-center">
                <h4>No hay Facturas Disponibles.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Tipo</th>
                            <th>Pto.Vta.</th>
                            <th>Número Fac.</th>
                            <th>CAE</th>                            
                            <th style="text-align:left">Cuit</th>
                            <th style="text-align:right">Importe Total</th>
                            <th style="text-align:right">Importe IVA</th>
                            <th>Fecha</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($facturas as $factura)
                        <tr>
                            <td>{{ $factura->nombre }}</td>
                            <td>{{ $factura->tipo }}</td>
                            <td>{{ $factura->ptovta }}</td>
                            <td>{{ $factura->nrocomp }}</td>
                            <td>{{ $factura->cae }}</td>                            
                            <td style="text-align:left">{{ $factura->cuit }}</td>
                            <td style="text-align:right">{{ $factura->imptot }}</td>
                            <td style="text-align:right">{{ $factura->impiva }}</td>
                            <td>{{ $factura->fecha }}</td>

                            <td>

                                <form method="POST" action="{!! route('facturas.factura.destroy', $factura->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                    <a href="{{ route('facturas.factura.imprimir', $factura->id ) }}" class="btn btn-info" title="Imprimir Factura">
                                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                        </a>                                    
                                        <a href="{{ route('facturas.factura.show', $factura->id ) }}" class="btn btn-info" title="Mostrar Factura">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('facturas.factura.edit', $factura->id ) }}" class="btn btn-primary" title="Editar Factura">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Borrar Factura" onclick="return confirm(&quot;Click Ok para borrar Factura.&quot;)">
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
           {!! $facturas->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection