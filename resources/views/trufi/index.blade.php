@extends('layouts.app')

@section('template_title')
    Trufi
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lista de Trufis') }}
                            </span>

                             <div class="float-right">
                             <a href="{{ route('trufis.pdf') }}" class="btn btn-primary btn-sm"  data-placement="left">
                                  {{ __('Generar reporte en PDF') }}
                                </a>
&nbsp; 
                                <a href="{{ route('trufis.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Registrar nuevo Trufi') }}
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
                                        <th>Nº</th>
                                        
										<th>INTERNO</th>
										<th>CHOFER</th>
										<th>VEHÍCULO</th>
										<th>GRUPO</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trufis as $trufi)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>Interno {{ $trufi->id }}</td>
											<td>{{ $trufi->chofere->nombre }}</td>
											<td>{{ $trufi->vehiculo->matricula }}</td>
											<td>{{ $trufi->gruporuta->nombre }}</td>

                                            <td>
                                                <form action="{{ route('trufis.destroy',$trufi->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('trufis.show',$trufi->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('trufis.edit',$trufi->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $trufis->links() !!}
            </div>
        </div>
    </div>
@endsection
