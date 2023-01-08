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

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>