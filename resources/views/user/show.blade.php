@extends('adminlte::page')
@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            {{ $user->last_name }}
                        </div>
                        <div class="form-group">
                            <strong>Document Type:</strong>
                            {{ $user->document_type }}
                        </div>
                        <div class="form-group">
                            <strong>Document Nro:</strong>
                            {{ $user->document_nro }}
                        </div>
                        <div class="form-group">
                            <strong>Identification Doc:</strong>
                            {{ $user->identification_doc }}
                        </div>
                        <div class="form-group">
                            <strong>Terms Agreements:</strong>
                            {{ $user->terms_agreements }}
                        </div>
                        <div class="form-group">
                            <strong>Labor Profile:</strong>
                            {{ $user->labor_profile }}
                        </div>
                        <div class="form-group">
                            <strong>Company Id:</strong>
                            {{ $user->company_id }}
                        </div>
                        <div class="form-group">
                            <strong>Branch Id:</strong>
                            {{ $user->branch_id }}
                        </div>
                        <div class="form-group">
                            <strong>Management Id:</strong>
                            {{ $user->management_id }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $user->status }}
                        </div>
                        <div class="form-group">
                            <strong>Admission Date:</strong>
                            {{ $user->admission_date }}
                        </div>
                        <div class="form-group">
                            <strong>Egress Date:</strong>
                            {{ $user->egress_date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
