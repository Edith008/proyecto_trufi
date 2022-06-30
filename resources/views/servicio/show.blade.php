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
                            <span class="card-title">Show Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('servicios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Trufi Id:</strong>
                            {{ $servicio->trufi_id }}
                        </div>
                        <div class="form-group">
                            <strong>Hsalida:</strong>
                            {{ $servicio->hsalida }}
                        </div>
                        <div class="form-group">
                            <strong>Hllegada:</strong>
                            {{ $servicio->hllegada }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $servicio->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion:</strong>
                            {{ $servicio->observacion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
