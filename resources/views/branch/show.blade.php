@extends('adminlte::page')

@section('content_header')
    <h1> Show Branch </h1>
@stop

@section('template_title')
    {{ $branch->name ?? 'Show Branch' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Branch</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('branches.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $branch->name }}
                        </div>
                        <div class="form-group">
                            <strong>Company Id:</strong>
                            {{ $branch->company_id }}
                        </div>
                        <div class="form-group">
                            <strong>Code:</strong>
                            {{ $branch->code }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
