



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


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
                <h4 class="mt-5 mb-5">Listas</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('listas.lista.create') }}" class="btn btn-success" title="Crear nuevo Lista">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($listas) == 0)
            <div class="panel-body text-center">
                <h4>No hay Listas Disponibles.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">


                <table id="example" class="display" style="width:100%">                
                    <thead>
                        <tr>
                        <th>Id</th>                        
                            <th>Idarticulo</th>
                            <th>Descripcion</th>
                            <th>Rubro</th>
                            <th>Precio2</th>
                            <th>Precio3</th>
                            <th>Precio4</th>
                            <th>Item1</th>
                            <th>Item2</th>
                            <th>Item3</th>
                            <th>Item4</th>
                            <th>Set1</th>
                            <th>Set2</th>
                            <th>Set3</th>
                            <th>Set4</th>
                            <!--
                            <th>Proveedor</th>
                            <th>Artprov</th>
                            <th>Stockable</th>
                            <th>Marca</th>
                            <th>Empresa</th>
                            <th>Dt Ult Cambio Precio</th>
                            <th>Importado</th> -->

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($listas as $lista)
                        <tr>
                        <td>{{ $lista->id }}</td>                        
                            <td>{{ $lista->idarticulo }}</td>
                            <td>{{ $lista->Descripcion }}</td>
                            <td>{{ $lista->rubro }}</td>
                            <td>{{ $lista->precio2 }}</td>
                            <td>{{ $lista->precio3 }}</td>
                            <td>{{ $lista->precio4 }}</td>
                            <td>{{ $lista->item1 }}</td>
                            <td>{{ $lista->item2 }}</td>
                            <td>{{ $lista->item3 }}</td>
                            <td>{{ $lista->item4 }}</td>
                            <td>{{ $lista->set1 }}</td>
                            <td>{{ $lista->set2 }}</td>
                            <td>{{ $lista->set3 }}</td>
                            <td>{{ $lista->set4 }}</td>
                            <!--
                            <td>{{ $lista->proveedor }}</td>
                            <td>{{ $lista->artprov }}</td>
                            <td>{{ $lista->stockable }}</td>
                            <td>{{ $lista->marca }}</td>
                            <td>{{ $lista->empresa }}</td>
                            <td>{{ $lista->dtUltCambioPrecio }}</td>
                            <td>{{ $lista->importado }}</td> -->
                            <td>
                                <a href="">Editar</a>


                            </td>            

 
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>


        
        @endif
    
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>  
  

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "columnDefs": [
            {
                // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in   http://localhost:8000/listas/3/edit
                // this case `data: 0`.
                "render": function ( data, type, row ) {
                    return '<a href="http://localhost:8000/listas/'+row[0]+'/edit">EDITAR</a>'                      ;
                },
                "targets": -1
            },
            { "visible": false,  "targets": [ 3 ] }
        ]
    } );
} );




</script>



