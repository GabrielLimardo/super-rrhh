<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('identification_nro') }}
            {{ Form::text('identification_nro', $company->identification_nro, ['class' => 'form-control' . ($errors->has('identification_nro') ? ' is-invalid' : ''), 'placeholder' => 'Identification Nro']) }}
            {!! $errors->first('identification_nro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fantasy_name') }}
            {{ Form::text('fantasy_name', $company->fantasy_name, ['class' => 'form-control' . ($errors->has('fantasy_name') ? ' is-invalid' : ''), 'placeholder' => 'Fantasy Name']) }}
            {!! $errors->first('fantasy_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('legal_name') }}
            {{ Form::text('legal_name', $company->legal_name, ['class' => 'form-control' . ($errors->has('legal_name') ? ' is-invalid' : ''), 'placeholder' => 'Legal Name']) }}
            {!! $errors->first('legal_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
            {{-- {{ Form::label('status') }}
            {{ Form::text('status', $company->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!} --}}
        {{-- </div>\ --}}
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