@extends('layouts.app')

@section('template_title')
    {{ $trufi->name ?? 'Show Trufi' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Información completa del Trufi</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('trufis.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Interno:</strong>
                            {{ $trufi->id }}
                        </div>
                        <div class="form-group">
                            <strong>Chofer:</strong>
                            {{ $trufi->chofere->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Vehiculo:</strong>
                            {{ $trufi->vehiculo->matricula }}
                        </div>
                        <div class="form-group">
                            <strong>Grupo:</strong>
                            {{ $trufi->gruporuta->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
