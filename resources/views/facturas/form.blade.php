<script language="JavaScript">
<!--
function abre_buscador() { 
  var nwin = window.open("{{ route('clientes.seleccionar') }}","abookpopup","width=400,height=500,resizable=yes,scrollbars=yes;location=no");
  if((!nwin.opener) && (document.windows != null))
    nwin.opener = document.windows;
}
// -->
</script>







<div class="row">
        <!-- CELDA CUIT  -->
        <div class="col-md-3">
            <div class="{{ $errors->has('cuit') ? 'has-error' : '' }}">
                <label class="form-control-label" for="cuit">CUIT</label>                 
                <div>
                    <input class="form-control" name="cuit" type="text" id="cuit" value="{{ old('cuit', optional($factura)->cuit) }}" minlength="1" maxlength="11" readonly >
                    {!! $errors->first('cuit', '<p class="help-block">:message</p>') !!}

                    <input  type=button class="btn btn-primary" value="Selección de Clientes" onclick="abre_buscador()" >



                </div>
            </div>
        </div>
        <!-- FIN CELDA CUIT  -->


        <div class="col-md-6">
            <div class="{{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label class="form-control-label" for="tipo">Nombre del Cliente</label>         
                <div>
                    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ old('nombre', optional($factura)->nombre) }}" minlength="1" readonly>
                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        </div>



</div>







<div class="form-group row">

<div class="col-md-4" >

        <div class="{{ $errors->has('tipo') ? 'has-error' : '' }}">
            <label class="form-control-label" for="tipo">Tipo</label>            
            <div>

            <input class="form-control" name="tipo" type="text" id="tipo" value="{{ $tipofactura }}" readonly >

                
                {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

</div>

<div class="col-md-4">

        <div class="{{ $errors->has('ptovta') ? 'has-error' : '' }}">
            <label class="form-control-label" for="ptovta">Punto de Venta</label>                        

            <div>
                <select class="form-control" id="ptovta" name="ptovta">
                        <option value="" style="display: none;" {{ old('ptovta', optional($factura)->ptovta ?: '') == '' ? 'selected' : '' }} disabled selected>Seleccione</option>
                    @foreach (['0001' => '0001',         '0002' => '0002',         '0003' => '0003',         '0004' => '0004'] as $key => $text)
                        <option value="{{ $key }}" {{ old('ptovta', optional($factura)->ptovta) == $key ? 'selected' : '' }}>
                            {{ $text }}
                        </option>
                    @endforeach
                </select>
                
                {!! $errors->first('ptovta', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

</div>
<div class="col-md-4">        
        
        <div class="{{ $errors->has('nrocomp') ? 'has-error' : '' }}">
            <label class="form-control-label" for="nrocomp">Número Factura</label>  
            <div>
                <input class="form-control" name="nrocomp" type="text" id="nrocomp" value="{{ $nueva_factura }}" minlength="1" maxlength="8">
                {!! $errors->first('nrocomp', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

</div>
</div>



<!--
<div class="form-group {{ $errors->has('imptot') ? 'has-error' : '' }}">
    <label for="imptot" class="col-md-2 control-label">Importe Total</label>
    <div class="col-md-10">
        <input class="form-control" name="imptot" type="text" id="imptot" value="{{ old('imptot', optional($factura)->imptot) }}" min="1" max="999999999" placeholder="Registre imptot aquí..." step="any">
        {!! $errors->first('imptot', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('impiva') ? 'has-error' : '' }}">
    <label for="impiva" class="col-md-2 control-label">Importe IVA</label>
    <div class="col-md-10">
        <input class="form-control" name="impiva" type="text" id="impiva" value="{{ old('impiva', optional($factura)->impiva) }}" min="1" max="999999999" placeholder="Registre impiva aquí..." step="any">
        {!! $errors->first('impiva', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
    <label for="fecha" class="col-md-2 control-label">Fecha</label>
    <div class="col-md-10">
        <input class="form-control" name="fecha" type="text" id="fecha" value="{{ old('fecha', optional($factura)->fecha) }}" minlength="1" placeholder="Registre fecha aquí...">
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div>

-->


<div class="form-group row">



<div class="col-md-8">
        <label class="form-control-label" for="articulo">Artículo</label>

      
        <!--<input type="number" id="articulo" name="articulo" class="form-control" > -->

        <select class="form-control selectpicker" name="id_producto" id="id_producto" data-live-search="true" required>
                                                            
        <option value="0" selected>Seleccione</option>
                                                            
        @foreach($articulos as $artic)
                                                            
        <option value="{{$artic->id}}_{{$artic->precio}}">{{$artic->articulo}}</option>
                                                                    
        @endforeach
                                
        </select>




</div>


<div class="col-md-2">
        <label class="form-control-label" for="precio_venta">Precio Venta</label>
        
        <input type="number" step=0.01 id="precio_venta" name="precio_venta" class="form-control" placeholder="Ingrese precio de venta" >
</div>



<div class="col-md-2">
        <label class="form-control-label" for="cantidad">Cantidad</label>
        
        <input type="number" step=0.01 id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese cantidad" pattern="[0-9]{0,15}">
</div>


</div>



<div class="col-md-4">
        
    <button type="button" id="agregar" class="btn btn-primary"><i class="fa fa-plus fa-2x"></i> Agregar detalle</button>
</div>






<div class="form-group row border">

<h3>Detalle de Factura</h3>

<div class="table-responsive col-md-12">
  <table id="detalles" class="table table-bordered table-striped table-sm">
  <thead>
      <tr class="bg-success">
          <th>Eliminar</th>
          <th>Producto</th>
          <th>Precio $</th>
          <th>Cantidad</th>
          <th>SubTotal $</th>
      </tr>
  </thead>
   
  <tfoot>




      <tr>
          <th  colspan="5"><p align="right">TOTAL PAGAR:</p></th>
          <th><p align="right"><span align="right" id="total_pagar_html">$ 0.00</span> <input type="hidden" name="total_pagar" id="total_pagar"></p></th>
      </tr>  

  </tfoot>

  <tbody>
  </tbody>
  
  
  </table>
</div>

</div>



