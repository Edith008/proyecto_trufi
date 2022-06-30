@extends('layouts.app')

@section('template_title')
    {{ $gruporuta->name ?? 'Show Gruporuta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Gruporuta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('gruporutas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ruta Id:</strong>
                            {{ $gruporuta->ruta_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $gruporuta->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
