@extends('layouts.app')

@section('template_title')
    {{ $servicio->name ?? 'Show Servicio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Información del Viaje</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Interno:</strong>
                            {{ $servicio->trufi_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre del Chofer:</strong>
                            {{ $servicio->trufi->chofere->nombre}}
                        </div>
                        <div class="form-group">
                            <strong>Nº Carnet:</strong>
                            {{ $servicio->trufi->chofere->ci}}
                        </div>
                        <div class="form-group">
                            <strong>Licencia:</strong>
                            {{ $servicio->trufi->chofere->licencia}}
                        </div>
                        <div class="form-group">
                            <strong>Vehiculo:</strong>
                            {{ $servicio->trufi->vehiculo->matricula}}
                        </div>
                        <div class="form-group">
                            <strong>Grupo:</strong>
                            {{ $servicio->trufi->gruporuta->nombre}}
                        </div>
                        <div class="form-group">
                            <strong>Ruta:</strong>
                            {{ $servicio->trufi->gruporuta->ruta->nombre}}
                        </div>
                        <div class="form-group">
                            <strong>Hora de Salida:</strong>
                            {{ $servicio->hsalida }}
                        </div>
                        <div class="form-group">
                            <strong>Hora de Llegada:</strong>
                            {{ $servicio->hllegada }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $servicio->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Observaciones:</strong>
                            {{ $servicio->observacion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
