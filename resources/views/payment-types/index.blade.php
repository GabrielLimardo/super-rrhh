@extends('adminlte::page')

@section('content_header')
    <h1> Payment types </h1>
@stop

@section('template_title')
    Payment Types
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Payment Types') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('payment-types.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>name</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($PaymentTypes as $PaymentTypes)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $PaymentTypes->name }}</td>

                                            <td>
                                                <form action="{{ route('payment-types.destroy',$PaymentTypes->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('payment-types.show',$PaymentTypes->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('payment-types.edit',$PaymentTypes->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {{-- {!! $PaymentTypes->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
