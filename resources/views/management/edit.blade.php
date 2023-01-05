@extends('adminlte::page')

@section('content_header')
    <h1> Update Management</h1>
@stop

@section('template_title')
    Update Management
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Management</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('management.update', $management->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('management.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
