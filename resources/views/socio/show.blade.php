@extends('layouts.app')

@section('template_title')
    {{ $socio->name ?? 'Show Socio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Datos del Socio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('socios.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>NOMBRE:</strong>
                            {{ $socio->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>CI:</strong>
                            {{ $socio->ci }}
                        </div>
                        <div class="form-group">
                            <strong>DIRECCION:</strong>
                            {{ $socio->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>FECHA NACIMIENTO:</strong>
                            {{ $socio->fnacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>EDAD:</strong>
                            {{ \Carbon\Carbon::parse($socio->fnacimiento)->age }} años
                        </div>
                        <div class="form-group">
                            <strong>FECHA AFILIACION:</strong>
                            {{ $socio->fafiliacion }}
                        </div>
                        <div class="form-group">
                            <strong>SEXO:</strong>
                            {{ $socio->sexo }}
                        </div>
                        <div class="form-group">
                            <strong>TELEFONO:</strong>
                            {{ $socio->telefono }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
