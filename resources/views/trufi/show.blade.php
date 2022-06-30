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
                            <span class="card-title">Show Trufi</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('trufis.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Chofer Id:</strong>
                            {{ $trufi->chofere->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Vehiculo Id:</strong>
                            {{ $trufi->vehiculo->matricula }}
                        </div>
                        <div class="form-group">
                            <strong>Gruporuta Id:</strong>
                            {{ $trufi->gruporuta->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
