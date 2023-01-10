@extends('adminlte::page')

@section('content_header')
    <h1> Show Document Type</h1>
@stop


@section('template_title')
    {{ $documentType->name ?? 'Show Document Type' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Document Type</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('document-types.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Organization Id:</strong>
                            {{ $documentType->organization_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $documentType->name }}
                        </div>
                        <div class="form-group">
                            <strong>Period:</strong>
                            {{ $documentType->period }}
                        </div>
                        <div class="form-group">
                            <strong>Sign First Rol Id:</strong>
                            {{ $documentType->sign_first_rol_id }}
                        </div>
                        <div class="form-group">
                            <strong>Code:</strong>
                            {{ $documentType->code }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $documentType->status }}
                        </div>
                        <div class="form-group">
                            <strong>Masive:</strong>
                            {{ $documentType->masive }}
                        </div>
                        <div class="form-group">
                            <strong>Employee See:</strong>
                            {{ $documentType->employee_see }}
                        </div>
                        <div class="form-group">
                            <strong>Regex:</strong>
                            {{ $documentType->regex }}
                        </div>
                        <div class="form-group">
                            <strong>C Up Left X:</strong>
                            {{ $documentType->c_up_left_x }}
                        </div>
                        <div class="form-group">
                            <strong>C Up Left Y:</strong>
                            {{ $documentType->c_up_left_y }}
                        </div>
                        <div class="form-group">
                            <strong>C Down Right X:</strong>
                            {{ $documentType->c_down_right_x }}
                        </div>
                        <div class="form-group">
                            <strong>C Down Right Y:</strong>
                            {{ $documentType->c_down_right_y }}
                        </div>
                        <div class="form-group">
                            <strong>Sign Father X:</strong>
                            {{ $documentType->sign_father_x }}
                        </div>
                        <div class="form-group">
                            <strong>Sign Father Y:</strong>
                            {{ $documentType->sign_father_y }}
                        </div>
                        <div class="form-group">
                            <strong>Sign Father High:</strong>
                            {{ $documentType->sign_father_high }}
                        </div>
                        <div class="form-group">
                            <strong>Sign Father Wide:</strong>
                            {{ $documentType->sign_father_wide }}
                        </div>
                        <div class="form-group">
                            <strong>Sign Son X:</strong>
                            {{ $documentType->sign_son_x }}
                        </div>
                        <div class="form-group">
                            <strong>Sign Son Y:</strong>
                            {{ $documentType->sign_son_y }}
                        </div>
                        <div class="form-group">
                            <strong>Sign Son High:</strong>
                            {{ $documentType->sign_son_high }}
                        </div>
                        <div class="form-group">
                            <strong>Sign Son Wide:</strong>
                            {{ $documentType->sign_son_wide }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
