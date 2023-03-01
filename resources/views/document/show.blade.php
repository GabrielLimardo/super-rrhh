@extends('layouts.app')

@section('template_title')
    {{ $document->name ?? 'Show Document' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Document</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('documents.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>File Path:</strong>
                            {{ $document->file_path }}
                        </div>
                        <div class="form-group">
                            <strong>Document Type Id:</strong>
                            {{ $document->document_type_id }}
                        </div>
                        <div class="form-group">
                            <strong>State Id:</strong>
                            {{ $document->state_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $document->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Dissatisfied Text:</strong>
                            {{ $document->dissatisfied_text }}
                        </div>
                        <div class="form-group">
                            <strong>Extra Filter:</strong>
                            {{ $document->extra_filter }}
                        </div>
                        <div class="form-group">
                            <strong>Employers Sees:</strong>
                            {{ $document->employers_sees }}
                        </div>
                        <div class="form-group">
                            <strong>Publication Date:</strong>
                            {{ $document->publication_date }}
                        </div>
                        <div class="form-group">
                            <strong>Period:</strong>
                            {{ $document->period }}
                        </div>
                        <div class="form-group">
                            <strong>Document Pack Id:</strong>
                            {{ $document->document_pack_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
