
<div class="form-group {{ $errors->has('descrip') ? 'has-error' : '' }}">
    <label for="descrip" class="col-md-2 control-label">Descripción</label>
    <div class="col-md-10">
        <input class="form-control" name="descrip" type="text" id="descrip" value="{{ old('descrip', optional($articulo)->descrip) }}" minlength="1" placeholder="Registre descrip aquí...">
        {!! $errors->first('descrip', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ean13') ? 'has-error' : '' }}">
    <label for="ean13" class="col-md-2 control-label">Ean13</label>
    <div class="col-md-10">
        <input class="form-control" name="ean13" type="text" id="ean13" value="{{ old('ean13', optional($articulo)->ean13) }}" minlength="1" placeholder="Registre ean13 aquí...">
        {!! $errors->first('ean13', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('codigo') ? 'has-error' : '' }}">
    <label for="codigo" class="col-md-2 control-label">Código</label>
    <div class="col-md-10">
        <input class="form-control" name="codigo" type="text" id="codigo" value="{{ old('codigo', optional($articulo)->codigo) }}" minlength="1" placeholder="Registre el código ...">
        {!! $errors->first('codigo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('id_rubro') ? 'has-error' : '' }}">
    <label for="id_rubro" class="col-md-2 control-label">Id Rubro</label>
    <div class="col-md-10">
        <select class="form-control" id="id_rubro" name="id_rubro">
        	    <option value="" style="display: none;" {{ old('id_rubro', optional($articulo)->id_rubro ?: '') == '' ? 'selected' : '' }} disabled selected>Registre id rubro aquí...</option>
        	@foreach (['0' => 'Productos',
'1' => 'Servicios',
'2' => 'Otros'] as $key => $text)
			    <option value="{{ $key }}" {{ old('id_rubro', optional($articulo)->id_rubro) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('id_rubro', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('umedida') ? 'has-error' : '' }}">
    <label for="umedida" class="col-md-2 control-label">Umedida</label>
    <div class="col-md-10">
        <select class="form-control" id="umedida" name="umedida">
        	    <option value="" style="display: none;" {{ old('umedida', optional($articulo)->umedida ?: '') == '' ? 'selected' : '' }} disabled selected>Registre umedida aquí...</option>
        	@foreach (['0' => 'Unidades',
'1' => 'Horas',
'2' => 'Cajas',
'3' => 'Kgs',
'4' => 'Litros',
'5' => '$'] as $key => $text)
			    <option value="{{ $key }}" {{ old('umedida', optional($articulo)->umedida) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('umedida', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('precio') ? 'has-error' : '' }}">
    <label for="precio" class="col-md-2 control-label">Precio</label>
    <div class="col-md-10">
        <input class="form-control" name="precio" type="text" id="precio" value="{{ old('precio', optional($articulo)->precio) }}" min="1" max="999999999" placeholder="Registre precio aquí..." step="any">
        {!! $errors->first('precio', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('costo') ? 'has-error' : '' }}">
    <label for="costo" class="col-md-2 control-label">Costo</label>
    <div class="col-md-10">
        <input class="form-control" name="costo" type="text" id="costo" value="{{ old('costo', optional($articulo)->costo) }}" min="1" max="999999999" placeholder="Registre costo aquí..." step="any">
        {!! $errors->first('costo', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('costod') ? 'has-error' : '' }}">
    <label for="costod" class="col-md-2 control-label">Costo U$S</label>
    <div class="col-md-10">
        <input class="form-control" name="costod" type="text" id="costod" value="{{ old('costod', optional($articulo)->costod) }}" min="1" max="999999999" placeholder="Costo U$S" step="any">
        {!! $errors->first('costod', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('codigoprov') ? 'has-error' : '' }}">
    <label for="codigoprov" class="col-md-2 control-label">Código Prov.</label>
    <div class="col-md-10">
        <input class="form-control" name="codigoprov" type="text" id="codigoprov" value="{{ old('codigoprov', optional($articulo)->codigoprov) }}" minlength="1" placeholder="Código Proveedor...">
        {!! $errors->first('codigoprov', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('proveedor') ? 'has-error' : '' }}">
    <label for="proveedor" class="col-md-2 control-label">Proveedor</label>
    <div class="col-md-10">
        <input class="form-control" name="proveedor" type="text" id="proveedor" value="{{ old('proveedor', optional($articulo)->proveedor) }}" minlength="1" placeholder="Proveedor ...">
        {!! $errors->first('proveedor', '<p class="help-block">:message</p>') !!}
    </div>
</div>