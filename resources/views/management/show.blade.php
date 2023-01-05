@extends('adminlte::page')

@section('content_header')
    <h1> Show Management </h1>
@stop

@section('template_title')
    {{ $management->name ?? 'Show Management' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Management</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('management.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $management->name }}
                        </div>
                        <div class="form-group">
                            <strong>Branch Id:</strong>
                            {{ $management->branch_id }}
                        </div>
                        <div class="form-group">
                            <strong>Code:</strong>
                            {{ $management->code }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
