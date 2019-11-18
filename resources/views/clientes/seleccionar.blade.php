@extends('layouts.miniapp')

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

    <script language="Javascript">
<!--
    function copiar_cerrar($cuit,$nombre) {
        copiar_celdas($cuit,$nombre);
        parent.close();
    }

    function copiar_celdas($cuit,$nombre) {
        var prefix    = "";
        var pwintype = typeof parent.opener.document;


        if (pwintype != "undefined") {

                parent.opener.document.getElementById("cuit").value  = $cuit;
                parent.opener.document.getElementById("nombre").value  = $nombre;                
         
        }
    }


-->
</script>

    <div style="background-color:#3c8dbc"  class="panel panel-default">

        <div>

            <div  class="text-center" >
                <h4 style="color:#ffffff;font-weight: bold; text-align=center" class="mt-5 mb-5">Seleccionar clientes</h4>
            </div>

            <div class="form-group row">
                            <div class="col-md-6">

                            <nav class="navbar navbar-light bg-light">
                                <form class="form-inline" method {{route('clientes.seleccionar')}} >
                                    <input name='buscarTexto' class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre o CUIT" 
                                    autocomplete='off' aria-label="Search" value="{{$buscarTexto}}" >
                                    <button style="font-weight: bold;  class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                </form>
                            </nav> 

                            </div>
            </div>            


        </div>
        
        @if(count($clientes) == 0)
            <div class="panel-body text-center">
                <h4 style="color:#ffffff;" >No hay Clientes Disponibles.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table  style="background-color:#ffffff" class="table ">
                    <thead  style="background-color:#817C7B">
                        <tr>
                            <th style="color:#ffffff"  >Nombre</th>
                            <th style="color:#ffffff"  >CUIT</th>
                 

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td  >{{ $cliente->nombre }}</td>
        
                            <td align="left" valign="top">&nbsp;
                                <a href="javascript:copiar_cerrar('{{ $cliente->cuit }}','{{ $cliente->nombre }}');">{{ $cliente->cuit }}</a>
                            </td>
     

                            <td>

                                <form method="POST" action="{!! route('clientes.cliente.destroy', $cliente->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}



                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $clientes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
@push('scripts')

@endpush

