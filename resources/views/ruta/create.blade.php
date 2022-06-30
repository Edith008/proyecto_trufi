@extends('layouts.app')

@section('template_title')
    Nueva Ruta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Nueva Ruta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('rutas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('ruta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
