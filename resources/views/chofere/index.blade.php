@extends('layouts.app')

@section('template_title')
    Chofere
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('  Choferes') }}

                                <form class="d-flex">
                                    <input name="buscarpor" class="form-control me-2" type="search" placeholder="Buscar por CI o Nombre" aria-label="search" value="{{ $buscarpor }}">
                                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                                </form>
                            </span>

                             <div class="float-right">

                                <a href="{{ route('choferes.pdf') }}" class="btn btn-primary btn-sm "  data-placement="left">
                                  {{ __('Generar reporte en PDF') }}
                                </a>
&nbsp; 
                                <a href="{{ route('choferes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Registrar Nuevo Chofer') }}
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
										<th>FECHA AFILIACION</th>
										<th>LICENCIA</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($choferes as $chofere)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $chofere->nombre }}</td>
											<td>{{ $chofere->ci }}</td>
											<td>{{ $chofere->fafiliacion }}</td>
											<td>{{ $chofere->licencia }}</td>

                                            <td>
                                                <form action="{{ route('choferes.destroy',$chofere->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('choferes.show',$chofere->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('choferes.edit',$chofere->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $choferes->links() !!}
            </div>
        </div>
    </div>
@endsection
