@extends('adminlte::page')

@section('content_header')
    <h1> Management </h1>
@stop

@section('template_title')
    Management
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Management') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('managements.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Name</th>
										<th>Branch Id</th>
										<th>Code</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($management as $management)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $management->name }}</td>
											<td>{{ $management->branch_id }}</td>
											<td>{{ $management->code }}</td>

                                            <td>
                                                <form action="{{ route('managements.destroy',$management->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('managements.show',$management->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('managements.edit',$management->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $management->links() !!}
            </div>
        </div>
    </div>
@endsection
