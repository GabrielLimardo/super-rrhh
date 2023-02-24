@extends('adminlte::page')

@section('content_header')
    <h1> Show Payment History </h1>
@stop

@section('template_title')
    {{ $paymentHistory->name ?? 'Show Payment History' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Payment History</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('payment-histories.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $paymentHistory->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $paymentHistory->amount }}
                        </div>
                        <div class="form-group">
                            <strong>Last:</strong>
                            {{ $paymentHistory->last }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
