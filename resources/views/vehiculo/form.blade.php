<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('socio_id') }}
            {{ Form::select('socio_id', $socios , $vehiculo->socio_id, ['class' => 'form-control' . ($errors->has('socio_id') ? ' is-invalid' : ''), 'placeholder' => 'Socio Id']) }}
            {!! $errors->first('socio_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('marca') }}
            {{ Form::text('marca', $vehiculo->marca, ['class' => 'form-control' . ($errors->has('marca') ? ' is-invalid' : ''), 'placeholder' => 'Marca']) }}
            {!! $errors->first('marca', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('matricula') }}
            {{ Form::text('matricula', $vehiculo->matricula, ['class' => 'form-control' . ($errors->has('matricula') ? ' is-invalid' : ''), 'placeholder' => 'Matricula']) }}
            {!! $errors->first('matricula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modelo') }}
            {{ Form::text('modelo', $vehiculo->modelo, ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
            {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ruat') }}
            {{ Form::text('ruat', $vehiculo->ruat, ['class' => 'form-control' . ($errors->has('ruat') ? ' is-invalid' : ''), 'placeholder' => 'Ruat']) }}
            {!! $errors->first('ruat', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $vehiculo->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('soat') }}
            {{ Form::text('soat', $vehiculo->soat, ['class' => 'form-control' . ($errors->has('soat') ? ' is-invalid' : ''), 'placeholder' => 'Soat']) }}
            {!! $errors->first('soat', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>