<?php

php artisan resource-file:from-database lista


php artisan resource-file:create Lista --fields=id,idarticulo,Descripcion,rubro,precio2,precio3,precio4,precio5,costo_ult_comp,gasto,item1,item2,item3,item4,set1,set2,set3,set4,proveedor,artprov,stockable,marca,empresa,dtUltCambioPrecio,importado,created_at,updated_at

id,idarticulo,Descripcion,rubro,precio2,precio3,precio4,precio5,costo_ult_comp,gasto,item1,item2,item3,item4,set1,set2,set3,set4,proveedor,artprov,stockable,marca,empresa,dtUltCambioPrecio,importado,created_at,updated_at

php artisan create:resources Lista


$(document).ready(function() {
    $('#example').DataTable( {
        "columnDefs": [
            {
                // The `data` parameter refers to the data for the cell.
                // The `rows`argument is an object representing all the data for the current row.
                "render": function ( data, type, row ) {
                    return "<button class='btn btn-danger btn-delete' data-pk='" + data + "'>" + row.name + "</button>";
                },
                "targets": -1  // -1 is the last column, 0 the first, 1 the second, etc.
            }
        ]
    } );
} );


$(document).ready(function() {
    $('#example').DataTable(
        {
  "columnDefs": [
    {
      "data": null,
      "defaultContent": "<button>Edit</button>",
      "targets": -1
    }
  ]
}


    );
} );


return '<a href=\"docs/resolutions/'+data+'\" target=\"_blank\">PDF</a>';



$(document).ready(function() {
    $('#example').DataTable( {
        "columnDefs": [
            {
                // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in
                // this case `data: 0`.
                "render": function ( data, type, row ) {
                    return data +' ('+ row[0]+')';
                },
                "targets": -1
            },
            { "visible": false,  "targets": [ 3 ] }
        ]
    } );
} );


$(document).ready(function() {
    $('#example').DataTable( {
        "columnDefs": [
            {
                targets: -1,
                render: function ( data, type, row, meta ) {
                   
                        data = '<a href="basic.php?game=' + encodeURIComponent(data) + '">' + data + '</a>';
                    

                    return data;
                }
            }
        ] 
    } );
} );


$(document).ready(function() {
    $('#example').DataTable( {
        "columnDefs": [
            {
                // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in   http://localhost:8000/listas/3/edit
                // this case `data: 0`.
                "render": function ( data, type, row ) {
                    return '<a href="http://localhost:8000/listas/'+row[0]+ '">EDITAR</a>'                      ;
                },
                "targets": -1
            },
            { "visible": false,  "targets": [ 3 ] }
        ]
    } );
} );


<select class="form-control selectpicker" name="deposito" id="id_deposito" data-live-search="true" required   >
                                                            
<option value="{{ old('deposito', optional($stock)->deposito) }}" selected>{{ old('deposito_name', optional($stock)->deposito) }}{{$deposito_name}}</option>
                                                                                                    
@foreach($depositos as $deposito)
                                                                                                    
<option value="{{ old('deposito', optional($stock)->deposito) }}">{{$deposito->nombre}}</option>

                                                                                                            
@endforeach
                                                                        
</select>




esto funciona

<div class="form-group {{ $errors->has('deposito') ? 'has-error' : '' }}">
    <label for="deposito" class="col-md-2 control-label">Deposito</label>
 



 

    <div class="col-md-10">
        <select class="form-control" id="deposito" name="deposito">

        <option value="" style="display: none;" {{ old('deposito', optional($stock)->deposito ?: '') == '' ? 'selected' : '' }} disabled selected> Registre depósito...</option>

        	@foreach ([ '4' => 'La Floresta',
                        '5' => 'Lavalle    '] as $key => $text)

			    <option value="{{ $key }}" {{ old('deposito', optional($stock)->deposito) == $key ? 'selected' : '' }}>
			    	{{ $text }}
		</option>
			@endforeach

        </select>

        
         {!! $errors->first('deposito', '<p class="help-block">:message</p>') !!}
 

</div>


En el controlador, esto funciona

public function edit($id)
{
    $stock = Stock::findOrFail($id);

    /*para el select de depositos */
    $depositos=DB::table('depositos')->get();    

    /*para repoblar el select con el valor almacenado */
    $deposito = Deposito::findOrFail($stock->deposito);
    $deposito_name = $deposito->nombre;

    /* A la vista le paso la instancia actual de stoc, mas la lista de depositos, mas */
    return view('stocks.edit', compact('stock','depositos','deposito_name'));
}
