@extends('adminlte::page')

@section('content_header')
    <h1>Show Company</h1>
@stop

@section('template_title')
    {{ $company->name ?? 'Show Company' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Company</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Identification Nro:</strong>
                            {{ $company->identification_nro }}
                        </div>
                        <div class="form-group">
                            <strong>Fantasy Name:</strong>
                            {{ $company->fantasy_name }}
                        </div>
                        <div class="form-group">
                            <strong>Legal Name:</strong>
                            {{ $company->legal_name }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $company->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
