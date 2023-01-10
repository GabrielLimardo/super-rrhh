@extends('layouts.app')

@section('template_title')
    Document Status
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Document Status') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('document-statuses.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Rol Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documentStatuses as $documentStatus)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $documentStatus->organization_id }}</td>
											<td>{{ $documentStatus->rol_id }}</td>

                                            <td>
                                                <form action="{{ route('document-statuses.destroy',$documentStatus->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('document-statuses.show',$documentStatus->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('document-statuses.edit',$documentStatus->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $documentStatuses->links() !!}
            </div>
        </div>
    </div>
@endsection
