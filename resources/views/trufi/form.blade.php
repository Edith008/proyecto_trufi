<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('CHOFER') }}
            {{ Form::select('chofer_id', $choferes , $trufi->chofer_id, ['class' => 'form-control' . ($errors->has('chofer_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Chofer']) }}
            {!! $errors->first('chofer_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('VEHICULO') }}
            {{ Form::select('vehiculo_id', $vehiculos , $trufi->vehiculo_id, ['class' => 'form-control' . ($errors->has('vehiculo_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Vehiculo']) }}
            {!! $errors->first('vehiculo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('GRUPO') }}
            {{ Form::select('gruporuta_id', $gruporutas , $trufi->gruporuta_id, ['class' => 'form-control' . ($errors->has('gruporuta_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar Grupo']) }}
            {!! $errors->first('gruporuta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>