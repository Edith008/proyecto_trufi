@extends('layouts.app')

@section('template_title')
    {{ $chofere->name ?? 'Show Chofere' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Información detallada del Chofer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('choferes.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $chofere->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>CI:</strong>
                            {{ $chofere->ci }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $chofere->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Nacimiento:</strong>
                            {{ $chofere->fnacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de afiliacion:</strong>
                            {{ $chofere->fafiliacion }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo:</strong>
                            {{ $chofere->sexo }}
                        </div>
                        <div class="form-group">
                            <strong>Licencia:</strong>
                            {{ $chofere->licencia }}
                        </div>
                        <div class="form-group">
                            <strong>Garantia:</strong>
                            {{ $chofere->garantia }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $chofere->telefono }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
