@extends('adminlte::page')

@section('content_header')
    <h1> Show Payment Types </h1>
@stop

@section('template_title')
    Create Payment Types
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Payment Types</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('payment-types.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('payment-types.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
