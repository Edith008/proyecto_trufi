@extends('layouts.app')

@section('template_title')
    Gruporuta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Gruporuta') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('gruporutas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Ruta Id</th>
										<th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gruporutas as $gruporuta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $gruporuta->ruta->nombre }}</td>
											<td>{{ $gruporuta->nombre }}</td>

                                            <td>
                                                <form action="{{ route('gruporutas.destroy',$gruporuta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('gruporutas.show',$gruporuta->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('gruporutas.edit',$gruporuta->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $gruporutas->links() !!}
            </div>
        </div>
    </div>
@endsection
