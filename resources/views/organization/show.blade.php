@extends('adminlte::page')

@section('content_header')
    <h1> Show Organization</h1>
@stop

@section('template_title')
    {{ $organization->name ?? 'Show Organization' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Organization</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('organization.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Identification Nro:</strong>
                            {{ $organization->identification_nro }}
                        </div>
                        <div class="form-group">
                            <strong>Fantasy Name:</strong>
                            {{ $organization->fantasy_name }}
                        </div>
                        <div class="form-group">
                            <strong>Legal Name:</strong>
                            {{ $organization->legal_name }}
                        </div>
                        <div class="form-group">
                            <strong>Code:</strong>
                            {{ $organization->code }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
