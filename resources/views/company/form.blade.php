<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Numero de identificacion') }}
            {{ Form::text('identification_nro', $company->identification_nro, ['class' => 'form-control' . ($errors->has('identification_nro') ? ' is-invalid' : ''), 'placeholder' => 'Identification Nro']) }}
            {!! $errors->first('identification_nro', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Organization') }}
            {{ Form::text('organitazation_id', $company->organitazation_id, ['class' => 'form-control' . ($errors->has('organitazation_id') ? ' is-invalid' : ''), 'placeholder' => 'organitazation_id Nro']) }}
            {!! $errors->first('organitazation_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Fantasy name') }}
            {{ Form::text('fantasy_name', $company->fantasy_name, ['class' => 'form-control' . ($errors->has('fantasy_name') ? ' is-invalid' : ''), 'placeholder' => 'Fantasy Name']) }}
            {!! $errors->first('fantasy_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Legal Name') }}
            {{ Form::text('legal_name', $company->legal_name, ['class' => 'form-control' . ($errors->has('legal_name') ? ' is-invalid' : ''), 'placeholder' => 'Legal Name']) }}
            {!! $errors->first('legal_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Code') }}
            {{ Form::text('code', $company->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Code']) }}
            {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('status') }}
            <select name="status" value="{{$company->status}}" id="status" class="col form-control selectpicker" data-Live-search="true">
                <option value="1" {{$company->status == 1? 'selected = "$company->status"': ''}}>
                   Activo
                </option>
                <option value="0" {{$company->status == 0? 'selected = "$company->status"': ''}}>
                   Inactivo
                </option>
            </select>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>