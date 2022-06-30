<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('trufi_id') }}
            {{ Form::select('trufi_id', $trufis , $servicio->trufi_id, ['class' => 'form-control' . ($errors->has('trufi_id') ? ' is-invalid' : ''), 'placeholder' => 'Trufi Id']) }}
            {!! $errors->first('trufi_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hsalida') }}
            {{ Form::text('hsalida', $servicio->hsalida, ['class' => 'form-control' . ($errors->has('hsalida') ? ' is-invalid' : ''), 'placeholder' => 'Hsalida']) }}
            {!! $errors->first('hsalida', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hllegada') }}
            {{ Form::text('hllegada', $servicio->hllegada, ['class' => 'form-control' . ($errors->has('hllegada') ? ' is-invalid' : ''), 'placeholder' => 'Hllegada']) }}
            {!! $errors->first('hllegada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $servicio->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observacion') }}
            {{ Form::text('observacion', $servicio->observacion, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
            {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>