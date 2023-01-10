@extends('adminlte::page')

@section('content_header')
    <h1> Create Document Type</h1>
@stop


@section('template_title')
    Create Document Type
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Document Type</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('document-types.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('document-type.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
