@extends('adminlte::page')

@section('content_header')
    <h1>Show Visual</h1>
@stop

@section('template_title')
    {{ $role->name ?? 'Show Visual Document' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Visual Document</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('visual.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Rol Id:</strong>
                            {{ $visualDocument->rol_id }}
                        </div>

                        <h3>Document columns </h3>

                        <div class="form-group">
                            <strong>Periodo:</strong>
                            {{ $visualDocument->periodo }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Documento:</strong>
                            {{ $visualDocument->tipo_documento }}
                        </div>
                        <div class="form-group">
                            <strong>Belong To:</strong>
                            {{ $visualDocument->belong_to }}
                        </div>
                        <div class="form-group">
                            <strong>Company:</strong>
                            {{ $visualDocument->company }}
                        </div>
                        <div class="form-group">
                            <strong>Branch:</strong>
                            {{ $visualDocument->branch }}
                        </div>
                        <div class="form-group">
                            <strong>Management:</strong>
                            {{ $visualDocument->management }}
                        </div>
                        <div class="form-group">
                            <strong>Document Nro:</strong>
                            {{ $visualDocument->document_nro }}
                        </div>
                        <div class="form-group">
                            <strong>Profile Nro:</strong>
                            {{ $visualDocument->profile_nro }}
                        </div>

                        <h3>Estatics</h3>

                        <div class="form-group">
                            <strong>New Employee:</strong>
                            {{ $visualStatistic->new_employee }}
                        </div>
                        <div class="form-group">
                            <strong>Total Employee:</strong>
                            {{ $visualStatistic->total_employee }}
                        </div>
                        <div class="form-group">
                            <strong>Document State:</strong>
                            {{ $visualStatistic->document_state }}
                        </div>
                        <div class="form-group">
                            <strong>Egress Employee:</strong>
                            {{ $visualStatistic->egress_employee }}
                        </div>
                        <div class="form-group">
                            <strong>Signed Documents:</strong>
                            {{ $visualStatistic->signed_documents }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
