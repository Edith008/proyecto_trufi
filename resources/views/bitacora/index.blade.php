@extends('layouts.app')

@section('template_title')
    Bitacora
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        
                            <span id="card_title">
                                {{ __('Bitacora') }}
                                <form class="d-flex">
                                    <input name="buscarpor" class="form-control me-2" type="search" placeholder="aaaa-mm-dd" aria-label="search">
                                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                                </form>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('bitacoras.pdf',$buscarpor) }}" class="btn btn-primary btn-sm "  data-placement="left">
                                  {{ __('Generar un reporte en PDF') }}
                                </a>
&nbsp; 
                                <!-- <a href="{{ route('bitacoras.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a> -->
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
                                        
										<th>DETALLE</th>
										<th>HORA</th>
										<th>FECHA</th>
										<th>USUARIO</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (array_reverse(iterator_to_array($bitacoras)) as $bitacora)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $bitacora->detalle }}</td>
											<td>{{ $bitacora->hora }}</td>
											<td>{{ $bitacora->fecha }}</td>
											<td>{{ $bitacora->user->name }}</td>

                                            <td>
                                                <form action="{{ route('bitacoras.destroy',$bitacora->id) }}" method="POST">
                                                    <!-- <a class="btn btn-sm btn-primary " href="{{ route('bitacoras.show',$bitacora->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('bitacoras.edit',$bitacora->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a> -->
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $bitacoras->links() !!}
            </div>
        </div>
    </div>
@endsection
