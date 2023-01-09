<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('rol_id') }}
            {{ Form::text('rol_id', $visualDocument->rol_id, ['class' => 'form-control' . ($errors->has('rol_id') ? ' is-invalid' : ''), 'placeholder' => 'Rol Id']) }}
            {!! $errors->first('rol_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="row">
            <div class="d-inline ">
                <h3>Document columns </h3>
            </div>
            <div class="d-inline ml-2 pt-2">
                <p>(max 5)</p>
            </div>
        </div>
        

        <div class="form-group">
            {{ Form::label('periodo') }}
            {{ Form::text('periodo', $visualDocument->periodo, ['class' => 'form-control' . ($errors->has('periodo') ? ' is-invalid' : ''), 'placeholder' => 'Periodo']) }}
            {!! $errors->first('periodo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_documento') }}
            {{ Form::text('tipo_documento', $visualDocument->tipo_documento, ['class' => 'form-control' . ($errors->has('tipo_documento') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Documento']) }}
            {!! $errors->first('tipo_documento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('belong_to') }}
            {{ Form::text('belong_to', $visualDocument->belong_to, ['class' => 'form-control' . ($errors->has('belong_to') ? ' is-invalid' : ''), 'placeholder' => 'Belong To']) }}
            {!! $errors->first('belong_to', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('company') }}
            {{ Form::text('company', $visualDocument->company, ['class' => 'form-control' . ($errors->has('company') ? ' is-invalid' : ''), 'placeholder' => 'Company']) }}
            {!! $errors->first('company', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('branch') }}
            {{ Form::text('branch', $visualDocument->branch, ['class' => 'form-control' . ($errors->has('branch') ? ' is-invalid' : ''), 'placeholder' => 'Branch']) }}
            {!! $errors->first('branch', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('management') }}
            {{ Form::text('management', $visualDocument->management, ['class' => 'form-control' . ($errors->has('management') ? ' is-invalid' : ''), 'placeholder' => 'Management']) }}
            {!! $errors->first('management', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('document_nro') }}
            {{ Form::text('document_nro', $visualDocument->document_nro, ['class' => 'form-control' . ($errors->has('document_nro') ? ' is-invalid' : ''), 'placeholder' => 'Document Nro']) }}
            {!! $errors->first('document_nro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('profile_nro') }}
            {{ Form::text('profile_nro', $visualDocument->profile_nro, ['class' => 'form-control' . ($errors->has('profile_nro') ? ' is-invalid' : ''), 'placeholder' => 'Profile Nro']) }}
            {!! $errors->first('profile_nro', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="row">
            <div class="d-inline ">
                <h3>Estatics </h3>
            </div>
            <div class="d-inline ml-2 pt-2">
                <p>(max 3)</p>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('new_employee') }}
            {{ Form::text('new_employee', $visualStatistic->new_employee, ['class' => 'form-control' . ($errors->has('new_employee') ? ' is-invalid' : ''), 'placeholder' => 'New Employee']) }}
            {!! $errors->first('new_employee', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total_employee') }}
            {{ Form::text('total_employee', $visualStatistic->total_employee, ['class' => 'form-control' . ($errors->has('total_employee') ? ' is-invalid' : ''), 'placeholder' => 'Total Employee']) }}
            {!! $errors->first('total_employee', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('document_state') }}
            {{ Form::text('document_state', $visualStatistic->document_state, ['class' => 'form-control' . ($errors->has('document_state') ? ' is-invalid' : ''), 'placeholder' => 'Document State']) }}
            {!! $errors->first('document_state', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('egress_employee') }}
            {{ Form::text('egress_employee', $visualStatistic->egress_employee, ['class' => 'form-control' . ($errors->has('egress_employee') ? ' is-invalid' : ''), 'placeholder' => 'Egress Employee']) }}
            {!! $errors->first('egress_employee', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('signed_documents') }}
            {{ Form::text('signed_documents', $visualStatistic->signed_documents, ['class' => 'form-control' . ($errors->has('signed_documents') ? ' is-invalid' : ''), 'placeholder' => 'Signed Documents']) }}
            {!! $errors->first('signed_documents', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>