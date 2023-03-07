<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('file_path') }}
            {{ Form::text('file_path', $license->file_path, ['class' => 'form-control' . ($errors->has('file_path') ? ' is-invalid' : ''), 'placeholder' => 'File Path']) }}
            {!! $errors->first('file_path', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('license_type_id') }}
            {{ Form::text('license_type_id', $license->license_type_id, ['class' => 'form-control' . ($errors->has('license_type_id') ? ' is-invalid' : ''), 'placeholder' => 'License Type Id']) }}
            {!! $errors->first('license_type_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('state_id') }}
            {{ Form::text('state_id', $license->state_id, ['class' => 'form-control' . ($errors->has('state_id') ? ' is-invalid' : ''), 'placeholder' => 'State Id']) }}
            {!! $errors->first('state_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $license->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dissatisfied_text') }}
            {{ Form::text('dissatisfied_text', $license->dissatisfied_text, ['class' => 'form-control' . ($errors->has('dissatisfied_text') ? ' is-invalid' : ''), 'placeholder' => 'Dissatisfied Text']) }}
            {!! $errors->first('dissatisfied_text', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('extra_filter') }}
            {{ Form::text('extra_filter', $license->extra_filter, ['class' => 'form-control' . ($errors->has('extra_filter') ? ' is-invalid' : ''), 'placeholder' => 'Extra Filter']) }}
            {!! $errors->first('extra_filter', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('employers_sees') }}
            {{ Form::text('employers_sees', $license->employers_sees, ['class' => 'form-control' . ($errors->has('employers_sees') ? ' is-invalid' : ''), 'placeholder' => 'Employers Sees']) }}
            {!! $errors->first('employers_sees', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('publication_date') }}
            {{ Form::text('publication_date', $license->publication_date, ['class' => 'form-control' . ($errors->has('publication_date') ? ' is-invalid' : ''), 'placeholder' => 'Publication Date']) }}
            {!! $errors->first('publication_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>