@extends('layouts.app')

@section('template_title')
    Socio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Socio') }}
                                <form class="d-flex">
                                    <input name="buscarpor" class="form-control me-2" type="search" placeholder="Buscar por CI o Nombre" aria-label="search">
                                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                                </form>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('socios.pdf',$buscarpor) }}" class="btn btn-primary btn-sm "  data-placement="left">
                                  {{ __('Generar un reporte en PDF') }}
                                </a>
&nbsp; 

                                <a href="{{ route('socios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Registrar Nuevo Socio') }}
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
                                        <th>N°</th>
                                        
										<th>NOMBRE</th>
										<th>CI</th>
										<th>DIRECCION</th>
										<th>EDAD</th>
										<th>FECHA AFILIACION</th>
										<th>TELEFONO</th>
										

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($socios as $socio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $socio->nombre }}</td>
											<td>{{ $socio->ci }}</td>
											<td>{{ $socio->direccion }}</td>
											<td>{{ \Carbon\Carbon::parse($socio->fnacimiento)->age }}</td>
											<td>{{ $socio->fafiliacion }}</td>
											<td>{{ $socio->telefono }}</td>

                                            <td>
                                                <form action="{{ route('socios.destroy',$socio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('socios.show',$socio->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('socios.edit',$socio->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $socios->links() !!}
            </div>
        </div>
    </div>
@endsection
