@extends('adminlte::page')

@section('content_header')
    <h1>Company</h1>
@stop

@section('template_title')
    Company
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Company') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('companies.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
                                        <th>Organitazation </th>
										<th>Identification Nro</th>
										<th>Fantasy Name</th>
										<th>Legal Name</th>
                                        <th>Code</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{{ $company->organitazation_id }}</td>
											<td>{{ $company->identification_nro }}</td>
											<td>{{ $company->fantasy_name }}</td>
											<td>{{ $company->legal_name }}</td>
                                            <td>{{ $company->code }}</td>
											<td> {{ $company->status == 1 ? 'Activo': 'Inactivo' }} </td>

                                            <td>
                                                <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('companies.show',$company->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('companies.edit',$company->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $companies->links() !!}
            </div>
        </div>
    </div>
@endsection
