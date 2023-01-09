@extends('layouts.app')

@section('template_title')
    Organization Config
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Organization Config') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('organization-configs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Organization Id</th>
										<th>Send Email</th>
										<th>Send Signature Email</th>
										<th>Dissatisfied</th>
										<th>Watch</th>
										<th>Download</th>
										<th>Sign First</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($organizationConfigs as $organizationConfig)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $organizationConfig->organization_id }}</td>
											<td>{{ $organizationConfig->send_email }}</td>
											<td>{{ $organizationConfig->send_signature_email }}</td>
											<td>{{ $organizationConfig->dissatisfied }}</td>
											<td>{{ $organizationConfig->watch }}</td>
											<td>{{ $organizationConfig->download }}</td>
											<td>{{ $organizationConfig->sign_first }}</td>

                                            <td>
                                                <form action="{{ route('organization-configs.destroy',$organizationConfig->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('organization-configs.show',$organizationConfig->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('organization-configs.edit',$organizationConfig->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $organizationConfigs->links() !!}
            </div>
        </div>
    </div>
@endsection
