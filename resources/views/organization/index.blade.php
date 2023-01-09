@extends('adminlte::page')

@section('content_header')
    <h1> Organization</h1>
@stop

@section('template_title')
    Organization
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Organization') }}
                            </span>

                            @if (is_null(Auth::user()->organization_id))  
                             <div class="float-right">
                                <a href="{{ route('organization.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                            @endif

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
                                        
										<th>Identification Nro</th>
										<th>Fantasy Name</th>
										<th>Legal Name</th>
										<th>Code</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($organizations as $organization)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $organization->identification_nro }}</td>
											<td>{{ $organization->fantasy_name }}</td>
											<td>{{ $organization->legal_name }}</td>
											<td>{{ $organization->code }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('organization.show',$organization->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('organization.edit',$organization->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
