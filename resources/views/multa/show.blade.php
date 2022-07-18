@extends('layouts.app')

@section('template_title')
    {{ $multa->name ?? 'Show Multa' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Multa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('multas.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Razón:</strong>
                            {{ $multa->razon }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $multa->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $multa->monto }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $multa->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Socio:</strong>
                            {{ $multa->socios->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Empleado:</strong>
                            {{ $multa->empleado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
