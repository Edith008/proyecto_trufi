<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('razon') }}
            {{ Form::text('razon', $multa->razon, ['class' => 'form-control' . ($errors->has('razon') ? ' is-invalid' : ''), 'placeholder' => 'Razon']) }}
            {!! $errors->first('razon', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $multa->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('monto') }}
            {{ Form::text('monto', $multa->monto, ['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
            {!! $errors->first('monto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $multa->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('socio') }}
            {{ Form::select('socio', $socios ,$multa->socio, ['class' => 'form-control' . ($errors->has('socio') ? ' is-invalid' : ''), 'placeholder' => 'Socio']) }}
            {!! $errors->first('socio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('registrado por') }}
            {{ Form::text('empleado', $multa->empleado, ['class' => 'form-control' . ($errors->has('empleado') ? ' is-invalid' : ''),  'Value' => Auth::user()->name , 'readonly']) }}
            {!! $errors->first('empleado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>