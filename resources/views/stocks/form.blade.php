<script language="JavaScript">
<!--
function abre_buscador() { 
  var nwin = window.open("{{ route('articulos.seleccionar') }}","abookpopup","width=400,height=500,resizable=yes,scrollbars=yes;location=no");
  if((!nwin.opener) && (document.windows != null))
    nwin.opener = document.windows;
}
// -->
</script>

<div class="row">

    <div class="col-md-3">
        <div class="form-group {{ $errors->has('articulo') ? 'has-error' : '' }}">

            <label class="form-control-label" for="articulo">Articulo Id</label>              
            <div>
                <input class="form-control" name="articulo" type="text" id="articulo" value="{{ old('articulo', optional($stock)->articulo) }}" minlength="1" min="-2147483648" max="2147483647" placeholder="Registre articulo aquí...">
                <input  type=button class="btn btn-primary" value="Selección Artículo" onclick="abre_buscador()" >
            </div>
        </div>
    </div> 

    <div class="col-md-3">
 
                    <label class="form-control-label" for="descrip">Descripción</label>         
                    <div>
                        <input class="form-control" name="descrip" type="text" id="descrip" value="{{ old('descrip', optional($articulo)->descrip) }}" minlength="1" readonly>
 
                    </div>
 

    </div>
    <div class="col-md-3">
 
                    <label class="form-control-label" for="codigo">Código</label>         
                    <div>
                        <input class="form-control" name="codigo" type="text" id="codigo" value="{{ old('codigo', optional($articulo)->codigo) }}" minlength="1" readonly>
 
                    </div>
 

 </div>




</div>




<div class="form-group {{ $errors->has('deposito') ? 'has-error' : '' }}">
    <label for="deposito" class="col-md-2 control-label">Depósito</label>
 

    <div class="col-md-10">
        <select class="form-control" id="deposito" name="deposito">

        <option value="" style="display: none;" {{ old('deposito', optional($stock)->deposito ?: '') == '' ? 'selected' : '' }} disabled selected> Registre depósito...</option>

        @foreach($depositos as $deposito)
            <option value="{{ $deposito->id }}" {{ old('deposito', optional($stock)->deposito) == $deposito->id ? 'selected' : '' }}>	{{ $deposito->nombre }} </option>
		@endforeach

        </select>

        
         {!! $errors->first('deposito', '<p class="help-block">:message</p>') !!}
 

</div>





</div>

 






<div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
    <label for="stock" class="col-md-2 control-label">Stock</label>
    <div class="col-md-10">
        <input class="form-control" name="stock" type="text" id="stock" value="{{ old('stock', optional($stock)->stock) }}" minlength="1" min="-9" max="9" placeholder="Registre stock aquí...">
        {!! $errors->first('stock', '<p class="help-block">:message</p>') !!}
    </div>
</div>

