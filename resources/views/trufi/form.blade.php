<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('chofer_id') }}
            {{ Form::select('chofer_id', $choferes , $trufi->chofer_id, ['class' => 'form-control' . ($errors->has('chofer_id') ? ' is-invalid' : ''), 'placeholder' => 'Chofer Id']) }}
            {!! $errors->first('chofer_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('vehiculo_id') }}
            {{ Form::select('vehiculo_id', $vehiculos , $trufi->vehiculo_id, ['class' => 'form-control' . ($errors->has('vehiculo_id') ? ' is-invalid' : ''), 'placeholder' => 'Vehiculo Id']) }}
            {!! $errors->first('vehiculo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('gruporuta_id') }}
            {{ Form::select('gruporuta_id', $gruporutas , $trufi->gruporuta_id, ['class' => 'form-control' . ($errors->has('gruporuta_id') ? ' is-invalid' : ''), 'placeholder' => 'Gruporuta Id']) }}
            {!! $errors->first('gruporuta_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>