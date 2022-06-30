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
                            <span class="card-title">Show Socio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('socios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $socio->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Ci:</strong>
                            {{ $socio->ci }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $socio->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Fnacimiento:</strong>
                            {{ $socio->fnacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Fafiliacion:</strong>
                            {{ $socio->fafiliacion }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo:</strong>
                            {{ $socio->sexo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
