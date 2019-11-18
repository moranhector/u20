<!--- CONSULTA DE FACTURA -->

<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
    <label for="nombre" class="col-md-2 control-label">Nombre del Cliente</label>
    <div class="col-md-10">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ old('nombre', optional($factura)->nombre) }}" minlength="1" placeholder="Registre nombre aquí...">
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
    <label for="tipo" class="col-md-2 control-label">Tipo</label>
    <div class="col-md-10">
        <select class="form-control" id="tipo" name="tipo">
        	    <option value="" style="display: none;" {{ old('tipo', optional($factura)->tipo ?: '') == '' ? 'selected' : '' }} disabled selected>Registre tipo aquí...</option>
        	@foreach (['A' => 'A',
'B' => 'B',
'C' => 'C'] as $key => $text)
			    <option value="{{ $key }}" {{ old('tipo', optional($factura)->tipo) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ptovta') ? 'has-error' : '' }}">
    <label for="ptovta" class="col-md-2 control-label">Punto de Venta</label>
    <div class="col-md-10">
        <select class="form-control" id="ptovta" name="ptovta">
        	    <option value="" style="display: none;" {{ old('ptovta', optional($factura)->ptovta ?: '') == '' ? 'selected' : '' }} disabled selected>Registre ptovta aquí...</option>
        	@foreach (['0001' => '0001',
'0002' => '0002',
'0003' => '0003',
'0004' => '0004'] as $key => $text)
			    <option value="{{ $key }}" {{ old('ptovta', optional($factura)->ptovta) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('ptovta', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nrocomp') ? 'has-error' : '' }}">
    <label for="nrocomp" class="col-md-2 control-label">Número Fac.</label>
    <div class="col-md-10">
        <input class="form-control" name="nrocomp" type="text" id="nrocomp" value="{{ old('nrocomp', optional($factura)->nrocomp) }}" minlength="1" maxlength="8" placeholder="Número de comprobante ...">
        {!! $errors->first('nrocomp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cuit') ? 'has-error' : '' }}">
    <label for="cuit" class="col-md-2 control-label">Cuit</label>
    <div class="col-md-10">
        <input class="form-control" name="cuit" type="text" id="cuit" value="{{ old('cuit', optional($factura)->cuit) }}" minlength="1" maxlength="11" placeholder="Registre cuit aquí...">
        {!! $errors->first('cuit', '<p class="help-block">:message</p>') !!}
    </div>
</div>

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

