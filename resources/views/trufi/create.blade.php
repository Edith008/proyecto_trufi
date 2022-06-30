@extends('layouts.app')

@section('template_title')
    Create Trufi
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Llenar el formulario con la información del nuevo trufi</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('trufis.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('trufi.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
