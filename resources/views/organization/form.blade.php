<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('identification_nro') }}
            {{ Form::text('identification_nro', $organization->identification_nro, ['class' => 'form-control' . ($errors->has('identification_nro') ? ' is-invalid' : ''), 'placeholder' => 'Identification Nro']) }}
            {!! $errors->first('identification_nro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fantasy_name') }}
            {{ Form::text('fantasy_name', $organization->fantasy_name, ['class' => 'form-control' . ($errors->has('fantasy_name') ? ' is-invalid' : ''), 'placeholder' => 'Fantasy Name']) }}
            {!! $errors->first('fantasy_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('legal_name') }}
            {{ Form::text('legal_name', $organization->legal_name, ['class' => 'form-control' . ($errors->has('legal_name') ? ' is-invalid' : ''), 'placeholder' => 'Legal Name']) }}
            {!! $errors->first('legal_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('code') }}
            {{ Form::text('code', $organization->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Code']) }}
            {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <h3>CONFIGURATION</h3>
        
         <div class="form-group">
            {{ Form::label('send_email') }}
            {{ Form::number('send_email', $organizationConfig->send_email, ['class' => 'form-control' . ($errors->has('send_email') ? ' is-invalid' : ''), 'placeholder' => 'Send Email']) }}
            {!! $errors->first('send_email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('send_signature_email') }}
            {{ Form::number('send_signature_email', $organizationConfig->send_signature_email, ['class' => 'form-control' . ($errors->has('send_signature_email') ? ' is-invalid' : ''), 'placeholder' => 'Send Signature Email']) }}
            {!! $errors->first('send_signature_email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dissatisfied') }}
            {{ Form::number('dissatisfied', $organizationConfig->dissatisfied, ['class' => 'form-control' . ($errors->has('dissatisfied') ? ' is-invalid' : ''), 'placeholder' => 'Dissatisfied']) }}
            {!! $errors->first('dissatisfied', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('watch') }}
            {{ Form::number('watch', $organizationConfig->watch, ['class' => 'form-control' . ($errors->has('watch') ? ' is-invalid' : ''), 'placeholder' => 'Watch']) }}
            {!! $errors->first('watch', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('download') }}
            {{ Form::number('download', $organizationConfig->download, ['class' => 'form-control' . ($errors->has('download') ? ' is-invalid' : ''), 'placeholder' => 'Download']) }}
            {!! $errors->first('download', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_first') }}
            {{ Form::number('sign_first', $organizationConfig->sign_first, ['class' => 'form-control' . ($errors->has('sign_first') ? ' is-invalid' : ''), 'placeholder' => 'Sign First']) }}
            {!! $errors->first('sign_first', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>