<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('INTERNO') }}
            {{ Form::select('trufi_id', $trufis , $servicio->trufi_id, ['class' => 'form-control' . ($errors->has('trufi_id') ? ' is-invalid' : ''), 'placeholder' => 'Elegir interno']) }}
            {!! $errors->first('trufi_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('HORA DE SALIDA') }}
            {{ Form::text('hsalida', $servicio->hsalida, ['class' => 'form-control' . ($errors->has('hsalida') ? ' is-invalid' : ''), 'Value' => $salida, 'readonly']) }}
            {!! $errors->first('hsalida', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <!-- <div class="form-group">
            {{ Form::label('hllegada') }}
            {{ Form::text('hllegada', $servicio->hllegada, ['class' => 'form-control' . ($errors->has('hllegada') ? ' is-invalid' : ''), 'readonly']) }}
            {!! $errors->first('hllegada', '<div class="invalid-feedback">:message</div>') !!}
        </div> -->
        <div class="form-group">
            {{ Form::label('FECHA') }}
            {{ Form::text('fecha', $servicio->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'Value' => $fecha, 'readonly']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('OBSERVACIONES') }}
            {{ Form::text('observacion', $servicio->observacion, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Escribir observaciones...']) }}
            {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">MARCAR SALIDA</button>
    </div>
</div>