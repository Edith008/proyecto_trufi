@extends('layouts.app')

@section('template_title')
    {{ $empleado->name ?? 'Show Empleado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Información de tallada del empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $empleado->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Registrado Por:</strong>
                            {{ $empleado->registrado_por }}
                        </div>
                        <div class="form-group">
                            <strong>Ci:</strong>
                            {{ $empleado->ci }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $empleado->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Nacimiento:</strong>
                            {{ $empleado->fnacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de afiliacion:</strong>
                            {{ $empleado->fafiliacion }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo:</strong>
                            {{ $empleado->sexo }}
                        </div>
                        <div class="form-group">
                            <strong>Cargo:</strong>
                            {{ $empleado->cargo }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $empleado->telefono }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
