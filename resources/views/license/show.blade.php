@extends('layouts.app')

@section('template_title')
    {{ $license->name ?? 'Show License' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show License</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('licenses.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>File Path:</strong>
                            {{ $license->file_path }}
                        </div>
                        <div class="form-group">
                            <strong>License Type Id:</strong>
                            {{ $license->license_type_id }}
                        </div>
                        <div class="form-group">
                            <strong>State Id:</strong>
                            {{ $license->state_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $license->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Dissatisfied Text:</strong>
                            {{ $license->dissatisfied_text }}
                        </div>
                        <div class="form-group">
                            <strong>Extra Filter:</strong>
                            {{ $license->extra_filter }}
                        </div>
                        <div class="form-group">
                            <strong>Employers Sees:</strong>
                            {{ $license->employers_sees }}
                        </div>
                        <div class="form-group">
                            <strong>Publication Date:</strong>
                            {{ $license->publication_date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
