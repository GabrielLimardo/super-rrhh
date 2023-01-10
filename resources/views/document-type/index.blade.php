@extends('adminlte::page')

@section('content_header')
    <h1> Create Document Type</h1>
@stop


@section('template_title')
    Document Type
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Document Type') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('document-types.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										{{-- <th>Organization Id</th> --}}
										<th>Name</th>
										<th>Period</th>
										<th>Sign First Rol Id</th>
										<th>Code</th>
										<th>Status</th>
										<th>Masive</th>
										<th>Employee See</th>
										{{-- <th>Regex</th> --}}
										{{-- <th>C Up Left X</th>
										<th>C Up Left Y</th>
										<th>C Down Right X</th>
										<th>C Down Right Y</th>
										<th>Sign Father X</th>
										<th>Sign Father Y</th>
										<th>Sign Father High</th>
										<th>Sign Father Wide</th>
										<th>Sign Son X</th>
										<th>Sign Son Y</th>
										<th>Sign Son High</th>
										<th>Sign Son Wide</th> --}}

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documentTypes as $documentType)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											{{-- <td>{{ $documentType->organization_id }}</td> --}}
											<td>{{ $documentType->name }}</td>
											<td>{{ $documentType->period }}</td>
											<td>{{ $documentType->sign_first_rol_id }}</td>
											<td>{{ $documentType->code }}</td>
											<td>{{ $documentType->status }}</td>
											<td>{{ $documentType->masive }}</td>
											<td>{{ $documentType->employee_see }}</td>
											{{-- <td>{{ $documentType->regex }}</td> --}}
											{{-- <td>{{ $documentType->c_up_left_x }}</td>
											<td>{{ $documentType->c_up_left_y }}</td>
											<td>{{ $documentType->c_down_right_x }}</td>
											<td>{{ $documentType->c_down_right_y }}</td>
											<td>{{ $documentType->sign_father_x }}</td>
											<td>{{ $documentType->sign_father_y }}</td>
											<td>{{ $documentType->sign_father_high }}</td>
											<td>{{ $documentType->sign_father_wide }}</td>
											<td>{{ $documentType->sign_son_x }}</td>
											<td>{{ $documentType->sign_son_y }}</td>
											<td>{{ $documentType->sign_son_high }}</td>
											<td>{{ $documentType->sign_son_wide }}</td> --}}

                                            <td>
                                                <form action="{{ route('document-types.destroy',$documentType->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('document-types.show',$documentType->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('document-types.edit',$documentType->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $documentTypes->links() !!}
            </div>
        </div>
    </div>
@endsection
