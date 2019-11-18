
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
    <label for="nombre" class="col-md-2 control-label">Nombre</label>
    <div class="col-md-10">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ old('nombre', optional($cliente)->nombre) }}" minlength="1" placeholder="Registre nombre aquí...">
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cuit') ? 'has-error' : '' }}">
    <label for="cuit" class="col-md-2 control-label">CUIT</label>
    <div class="col-md-10">
        <input class="form-control" name="cuit" type="text" id="cuit" value="{{ old('cuit', optional($cliente)->cuit) }}" minlength="1" placeholder="Registre cuit aquí...">
        {!! $errors->first('cuit', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('iva_cond') ? 'has-error' : '' }}">
    <label for="iva_cond" class="col-md-2 control-label">Iva Cond</label>
    <div class="col-md-10">
        <select class="form-control" id="iva_cond" name="iva_cond">
        	    <option value="" style="display: none;" {{ old('iva_cond', optional($cliente)->iva_cond ?: '') == '' ? 'selected' : '' }} disabled selected>Registre iva cond aquí...</option>
        	@foreach (['1' => 'Responsable Inscripto',
'2' => 'Monotributista',
'3' => 'Consumidor Final',
'4' => 'Exento',
'5' => 'Extranjero'] as $key => $text)
			    <option value="{{ $key }}" {{ old('iva_cond', optional($cliente)->iva_cond) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('iva_cond', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('domicilio') ? 'has-error' : '' }}">
    <label for="domicilio" class="col-md-2 control-label">Domicilio</label>
    <div class="col-md-10">
        <input class="form-control" name="domicilio" type="text" id="domicilio" value="{{ old('domicilio', optional($cliente)->domicilio) }}" minlength="1" placeholder="Registre domicilio aquí...">
        {!! $errors->first('domicilio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
    <label for="telefono" class="col-md-2 control-label">Telefono</label>
    <div class="col-md-10">
        <input class="form-control" name="telefono" type="text" id="telefono" value="{{ old('telefono', optional($cliente)->telefono) }}" minlength="1" placeholder="Registre telefono aquí...">
        {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($cliente)->email) }}" placeholder="Registre email aquí...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

