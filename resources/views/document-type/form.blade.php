<div class="box box-info padding-1">
    <div class="box-body">
        
        {{-- <div class="form-group">
            {{ Form::label('organization_id') }}
            {{ Form::text('organization_id', $documentType->organization_id, ['class' => 'form-control' . ($errors->has('organization_id') ? ' is-invalid' : ''), 'placeholder' => 'Organization Id']) }}
            {!! $errors->first('organization_id', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $documentType->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('period') }}
            {{ Form::text('period', $documentType->period, ['class' => 'form-control' . ($errors->has('period') ? ' is-invalid' : ''), 'placeholder' => 'Period']) }}
            {!! $errors->first('period', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_first_rol_id') }}
            {{ Form::text('sign_first_rol_id', $documentType->sign_first_rol_id, ['class' => 'form-control' . ($errors->has('sign_first_rol_id') ? ' is-invalid' : ''), 'placeholder' => 'Sign First Rol Id']) }}
            {!! $errors->first('sign_first_rol_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('code') }}
            {{ Form::text('code', $documentType->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Code']) }}
            {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $documentType->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('masive') }}
            {{ Form::text('masive', $documentType->masive, ['class' => 'form-control' . ($errors->has('masive') ? ' is-invalid' : ''), 'placeholder' => 'Masive']) }}
            {!! $errors->first('masive', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('employee_see') }}
            {{ Form::text('employee_see', $documentType->employee_see, ['class' => 'form-control' . ($errors->has('employee_see') ? ' is-invalid' : ''), 'placeholder' => 'Employee See']) }}
            {!! $errors->first('employee_see', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('regex') }}
            {{ Form::text('regex', $documentType->regex, ['class' => 'form-control' . ($errors->has('regex') ? ' is-invalid' : ''), 'placeholder' => 'Regex']) }}
            {!! $errors->first('regex', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('c_up_left_x') }}
            {{ Form::text('c_up_left_x', $documentType->c_up_left_x, ['class' => 'form-control' . ($errors->has('c_up_left_x') ? ' is-invalid' : ''), 'placeholder' => 'C Up Left X']) }}
            {!! $errors->first('c_up_left_x', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('c_up_left_y') }}
            {{ Form::text('c_up_left_y', $documentType->c_up_left_y, ['class' => 'form-control' . ($errors->has('c_up_left_y') ? ' is-invalid' : ''), 'placeholder' => 'C Up Left Y']) }}
            {!! $errors->first('c_up_left_y', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('c_down_right_x') }}
            {{ Form::text('c_down_right_x', $documentType->c_down_right_x, ['class' => 'form-control' . ($errors->has('c_down_right_x') ? ' is-invalid' : ''), 'placeholder' => 'C Down Right X']) }}
            {!! $errors->first('c_down_right_x', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('c_down_right_y') }}
            {{ Form::text('c_down_right_y', $documentType->c_down_right_y, ['class' => 'form-control' . ($errors->has('c_down_right_y') ? ' is-invalid' : ''), 'placeholder' => 'C Down Right Y']) }}
            {!! $errors->first('c_down_right_y', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_father_x') }}
            {{ Form::text('sign_father_x', $documentType->sign_father_x, ['class' => 'form-control' . ($errors->has('sign_father_x') ? ' is-invalid' : ''), 'placeholder' => 'Sign Father X']) }}
            {!! $errors->first('sign_father_x', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_father_y') }}
            {{ Form::text('sign_father_y', $documentType->sign_father_y, ['class' => 'form-control' . ($errors->has('sign_father_y') ? ' is-invalid' : ''), 'placeholder' => 'Sign Father Y']) }}
            {!! $errors->first('sign_father_y', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_father_high') }}
            {{ Form::text('sign_father_high', $documentType->sign_father_high, ['class' => 'form-control' . ($errors->has('sign_father_high') ? ' is-invalid' : ''), 'placeholder' => 'Sign Father High']) }}
            {!! $errors->first('sign_father_high', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_father_wide') }}
            {{ Form::text('sign_father_wide', $documentType->sign_father_wide, ['class' => 'form-control' . ($errors->has('sign_father_wide') ? ' is-invalid' : ''), 'placeholder' => 'Sign Father Wide']) }}
            {!! $errors->first('sign_father_wide', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_son_x') }}
            {{ Form::text('sign_son_x', $documentType->sign_son_x, ['class' => 'form-control' . ($errors->has('sign_son_x') ? ' is-invalid' : ''), 'placeholder' => 'Sign Son X']) }}
            {!! $errors->first('sign_son_x', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_son_y') }}
            {{ Form::text('sign_son_y', $documentType->sign_son_y, ['class' => 'form-control' . ($errors->has('sign_son_y') ? ' is-invalid' : ''), 'placeholder' => 'Sign Son Y']) }}
            {!! $errors->first('sign_son_y', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_son_high') }}
            {{ Form::text('sign_son_high', $documentType->sign_son_high, ['class' => 'form-control' . ($errors->has('sign_son_high') ? ' is-invalid' : ''), 'placeholder' => 'Sign Son High']) }}
            {!! $errors->first('sign_son_high', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_son_wide') }}
            {{ Form::text('sign_son_wide', $documentType->sign_son_wide, ['class' => 'form-control' . ($errors->has('sign_son_wide') ? ' is-invalid' : ''), 'placeholder' => 'Sign Son Wide']) }}
            {!! $errors->first('sign_son_wide', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>