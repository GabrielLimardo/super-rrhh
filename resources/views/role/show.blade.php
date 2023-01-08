@extends('adminlte::page')

@section('content_header')
    <h1> Show Role</h1>
@stop


@section('template_title')
    {{ $role->name ?? 'Show Role' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Role</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $role->name }}
                        </div>

                        <div class="form-group">
                            <strong>Organization:</strong>
                            {{ $role->organization_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
