@extends('adminlte::page')

@section('content_header')
    <h1> Create Company</h1>
@stop

@section('template_title')
    Create Company
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Company</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('companies.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('company.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
