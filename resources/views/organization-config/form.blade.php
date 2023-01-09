<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('organization_id') }}
            {{ Form::text('organization_id', $organizationConfig->organization_id, ['class' => 'form-control' . ($errors->has('organization_id') ? ' is-invalid' : ''), 'placeholder' => 'Organization Id']) }}
            {!! $errors->first('organization_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('send_email') }}
            {{ Form::text('send_email', $organizationConfig->send_email, ['class' => 'form-control' . ($errors->has('send_email') ? ' is-invalid' : ''), 'placeholder' => 'Send Email']) }}
            {!! $errors->first('send_email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('send_signature_email') }}
            {{ Form::text('send_signature_email', $organizationConfig->send_signature_email, ['class' => 'form-control' . ($errors->has('send_signature_email') ? ' is-invalid' : ''), 'placeholder' => 'Send Signature Email']) }}
            {!! $errors->first('send_signature_email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dissatisfied') }}
            {{ Form::text('dissatisfied', $organizationConfig->dissatisfied, ['class' => 'form-control' . ($errors->has('dissatisfied') ? ' is-invalid' : ''), 'placeholder' => 'Dissatisfied']) }}
            {!! $errors->first('dissatisfied', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('watch') }}
            {{ Form::text('watch', $organizationConfig->watch, ['class' => 'form-control' . ($errors->has('watch') ? ' is-invalid' : ''), 'placeholder' => 'Watch']) }}
            {!! $errors->first('watch', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('download') }}
            {{ Form::text('download', $organizationConfig->download, ['class' => 'form-control' . ($errors->has('download') ? ' is-invalid' : ''), 'placeholder' => 'Download']) }}
            {!! $errors->first('download', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_first') }}
            {{ Form::text('sign_first', $organizationConfig->sign_first, ['class' => 'form-control' . ($errors->has('sign_first') ? ' is-invalid' : ''), 'placeholder' => 'Sign First']) }}
            {!! $errors->first('sign_first', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>