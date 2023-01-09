@extends('adminlte::page')

@section('content_header')
    <h1> Update Organization</h1>
@stop

@section('template_title')
    Update Organization
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Organization</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('organization.update', $organization->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('organization.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
