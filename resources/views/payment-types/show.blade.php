@extends('adminlte::page')

@section('content_header')
    <h1> Show Payment types </h1>
@stop

@section('template_title')
    {{ $PaymentTypes->name ?? 'Show Payment types' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Payment Types</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('payment-types.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>name:</strong>
                            {{ $PaymentTypes->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
