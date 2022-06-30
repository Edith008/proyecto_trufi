@extends('layouts.app')

@section('template_title')
    Servicio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Servicio') }}
                                <form class="d-flex">
                                    <input name="buscarpor" class="form-control me-2" type="search" placeholder="Buscar" aria-label="search" value="{{ $buscarpor }}">
                                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                                </form>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('servicios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('NUEVA SALIDA') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Nº Registro</th>
                                        
										<th>INTERNO</th>
										<th>CHOFER</th>
										<th>SALIDA</th>
										<th>LLEGADA</th>
										<th>FECHA</th>
										<th>OBSERVACIONES</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($servicios as $servicio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $servicio->trufi->id}}</td>
											<td>{{ $servicio->trufi->chofere->nombre}}</td>
											<td>{{ $servicio->hsalida }}</td>
											<td>{{ $servicio->hllegada }}</td>
											<td>{{ $servicio->fecha }}</td>
											<td>{{ $servicio->observacion }}</td>

                                            <td>
                                                <form action="{{ route('servicios.destroy',$servicio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('servicios.show',$servicio->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('servicios.edit',$servicio->id) }}"><i class="fa fa-fw fa-edit"></i> Marcar Llegada</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $servicios->links() !!}
            </div>
        </div>
    </div>
@endsection
