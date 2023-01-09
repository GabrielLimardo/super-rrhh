@extends('layouts.app')

@section('template_title')
    {{ $organizationConfig->name ?? 'Show Organization Config' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Organization Config</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('organization-configs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Organization Id:</strong>
                            {{ $organizationConfig->organization_id }}
                        </div>
                        <div class="form-group">
                            <strong>Send Email:</strong>
                            {{ $organizationConfig->send_email }}
                        </div>
                        <div class="form-group">
                            <strong>Send Signature Email:</strong>
                            {{ $organizationConfig->send_signature_email }}
                        </div>
                        <div class="form-group">
                            <strong>Dissatisfied:</strong>
                            {{ $organizationConfig->dissatisfied }}
                        </div>
                        <div class="form-group">
                            <strong>Watch:</strong>
                            {{ $organizationConfig->watch }}
                        </div>
                        <div class="form-group">
                            <strong>Download:</strong>
                            {{ $organizationConfig->download }}
                        </div>
                        <div class="form-group">
                            <strong>Sign First:</strong>
                            {{ $organizationConfig->sign_first }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
