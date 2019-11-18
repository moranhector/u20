
<div class="form-group {{ $errors->has('propietario') ? 'has-error' : '' }}">
    <label for="propietario" class="col-md-2 control-label">Propietario</label>
    <div class="col-md-10">
        <input class="form-control" name="propietario" type="text" id="propietario" value="{{ old('propietario', optional($sistema)->propietario) }}" minlength="1" placeholder="Registre aquí el nombre del propietario ...">
        {!! $errors->first('propietario', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cuit') ? 'has-error' : '' }}">
    <label for="cuit" class="col-md-2 control-label">CUIT</label>
    <div class="col-md-10">
        <input class="form-control" name="cuit" type="text" id="cuit" value="{{ old('cuit', optional($sistema)->cuit) }}" minlength="11" maxlength="11" placeholder="Registre cuit ...">
        {!! $errors->first('cuit', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('condiva') ? 'has-error' : '' }}">
    <label for="condiva" class="col-md-2 control-label">Responsabilidad frente IVA</label>
    <div class="col-md-10">
        <select class="form-control" id="condiva" name="condiva">
        	    <option value="" style="display: none;" {{ old('condiva', optional($sistema)->condiva ?: '') == '' ? 'selected' : '' }} disabled selected>Condición IVA...</option>
        	@foreach (['1' => 'Responsable Inscripto',
'2' => 'Monotributista',
'4' => 'Exento'] as $key => $text)
			    <option value="{{ $key }}" {{ old('condiva', optional($sistema)->condiva) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('condiva', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('deposito') ? 'has-error' : '' }}">
    <label for="deposito" class="col-md-2 control-label">Depósito por Defecto</label>
    <div class="col-md-10">
        <input class="form-control" name="deposito" type="text" id="deposito" value="{{ old('deposito', optional($sistema)->deposito) }}" minlength="1" placeholder="Registre deposito aquí...">
        {!! $errors->first('deposito', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('actualiza_stock') ? 'has-error' : '' }}">
    <label for="actualiza_stock" class="col-md-2 control-label">Actualiza Stock</label>
    <div class="col-md-10">
        <select class="form-control" id="actualiza_stock" name="actualiza_stock">
        	    <option value="" style="display: none;" {{ old('actualiza_stock', optional($sistema)->actualiza_stock ?: '') == '' ? 'selected' : '' }} disabled selected>¿Actualiza stock?</option>
        	@foreach (['S' => 'SI',
'N' => 'NO'] as $key => $text)
			    <option value="{{ $key }}" {{ old('actualiza_stock', optional($sistema)->actualiza_stock) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('actualiza_stock', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
    <label for="telefono" class="col-md-2 control-label">Teléfono</label>
    <div class="col-md-10">
        <input class="form-control" name="telefono" type="text" id="telefono" value="{{ old('telefono', optional($sistema)->telefono) }}" minlength="1" placeholder="Registre Teléfono.">
        {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">E-mail</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($sistema)->email) }}" placeholder="Registre email aquí...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('domicilio') ? 'has-error' : '' }}">
    <label for="domicilio" class="col-md-2 control-label">Domicilio</label>
    <div class="col-md-10">
        <input class="form-control" name="domicilio" type="text" id="domicilio" value="{{ old('domicilio', optional($sistema)->domicilio) }}" minlength="1" placeholder="Registre domicilio aquí...">
        {!! $errors->first('domicilio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ingresos_brutos') ? 'has-error' : '' }}">
    <label for="ingresos_brutos" class="col-md-2 control-label">Ingresos Brutos</label>
    <div class="col-md-10">
        <input class="form-control" name="ingresos_brutos" type="text" id="ingresos_brutos" value="{{ old('ingresos_brutos', optional($sistema)->ingresos_brutos) }}" minlength="1" placeholder="Registre ingresos brutos aquí...">
        {!! $errors->first('ingresos_brutos', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fecha_inicio') ? 'has-error' : '' }}">
    <label for="fecha_inicio" class="col-md-2 control-label">Fecha Inicio</label>
    <div class="col-md-10">
        <input class="form-control" name="fecha_inicio" type="text" id="fecha_inicio" value="{{ old('fecha_inicio', optional($sistema)->fecha_inicio) }}" minlength="1" placeholder="Registre fecha inicio aquí...">
        {!! $errors->first('fecha_inicio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sitio') ? 'has-error' : '' }}">
    <label for="sitio" class="col-md-2 control-label">Sitio</label>
    <div class="col-md-10">
        <input class="form-control" name="sitio" type="text" id="sitio" value="{{ old('sitio', optional($sistema)->sitio) }}" minlength="1" placeholder="Registre sitio aquí...">
        {!! $errors->first('sitio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
    <label for="logo" class="col-md-2 control-label">Logo</label>
    <div class="col-md-10">
        <input class="form-control" name="logo" type="text" id="logo" value="{{ old('logo', optional($sistema)->logo) }}" minlength="1" placeholder="Registre logo aquí...">
        {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

