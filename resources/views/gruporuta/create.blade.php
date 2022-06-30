@extends('layouts.app')

@section('template_title')
    Create Gruporuta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Gruporuta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('gruporutas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('gruporuta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
