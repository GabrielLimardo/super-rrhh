<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('last_name') }}
            {{ Form::text('last_name', $user->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Last Name']) }}
            {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('document_type') }}
            {{ Form::text('document_type', $user->document_type, ['class' => 'form-control' . ($errors->has('document_type') ? ' is-invalid' : ''), 'placeholder' => 'Document Type']) }}
            {!! $errors->first('document_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('document_nro') }}
            {{ Form::text('document_nro', $user->document_nro, ['class' => 'form-control' . ($errors->has('document_nro') ? ' is-invalid' : ''), 'placeholder' => 'Document Nro']) }}
            {!! $errors->first('document_nro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('identification_doc') }}
            {{ Form::text('identification_doc', $user->identification_doc, ['class' => 'form-control' . ($errors->has('identification_doc') ? ' is-invalid' : ''), 'placeholder' => 'Identification Doc']) }}
            {!! $errors->first('identification_doc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('terms_agreements') }}
            {{ Form::text('terms_agreements', $user->terms_agreements, ['class' => 'form-control' . ($errors->has('terms_agreements') ? ' is-invalid' : ''), 'placeholder' => 'Terms Agreements']) }}
            {!! $errors->first('terms_agreements', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('labor_profile') }}
            {{ Form::text('labor_profile', $user->labor_profile, ['class' => 'form-control' . ($errors->has('labor_profile') ? ' is-invalid' : ''), 'placeholder' => 'Labor Profile']) }}
            {!! $errors->first('labor_profile', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('company_id') }}
            {{ Form::text('company_id', $user->company_id, ['class' => 'form-control' . ($errors->has('company_id') ? ' is-invalid' : ''), 'placeholder' => 'Company Id']) }}
            {!! $errors->first('company_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('branch_id') }}
            {{ Form::text('branch_id', $user->branch_id, ['class' => 'form-control' . ($errors->has('branch_id') ? ' is-invalid' : ''), 'placeholder' => 'Branch Id']) }}
            {!! $errors->first('branch_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('management_id') }}
            {{ Form::text('management_id', $user->management_id, ['class' => 'form-control' . ($errors->has('management_id') ? ' is-invalid' : ''), 'placeholder' => 'Management Id']) }}
            {!! $errors->first('management_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $user->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('admission_date') }}
            {{ Form::text('admission_date', $user->admission_date, ['class' => 'form-control' . ($errors->has('admission_date') ? ' is-invalid' : ''), 'placeholder' => 'Admission Date']) }}
            {!! $errors->first('admission_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('egress_date') }}
            {{ Form::text('egress_date', $user->egress_date, ['class' => 'form-control' . ($errors->has('egress_date') ? ' is-invalid' : ''), 'placeholder' => 'Egress Date']) }}
            {!! $errors->first('egress_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>