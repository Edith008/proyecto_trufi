@extends('layouts.app')

@section('template_title')
    Ruta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ruta') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('rutas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva Ruta') }}
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
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Punto de Salida</th>
										<th>Punto de Llegada</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rutas as $ruta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ruta->nombre }}</td>
											<td>{{ $ruta->psalida }}</td>
											<td>{{ $ruta->pllegada }}</td>

                                            <td>
                                                <form action="{{ route('rutas.destroy',$ruta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('rutas.show',$ruta->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('rutas.edit',$ruta->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $rutas->links() !!}
            </div>
        </div>
    </div>
@endsection
