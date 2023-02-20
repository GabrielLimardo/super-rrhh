@extends('adminlte::page')

@section('content_header')
    <h1> Update Payment History</h1>
@stop

@section('template_title')
    Update Payment History
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Payment History</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('payment-histories.update', $paymentHistory->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('payment-history.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
