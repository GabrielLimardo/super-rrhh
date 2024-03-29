@extends('adminlte::page')

@section('content_header')
    <h1> Update Company</h1>
@stop

@section('template_title')
    Update Company
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Company</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('companies.update', $company->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('company.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
