<div class="box box-info padding-1">
    <div class="box-body">       
        <div class="form-group">
            {{ Form::label('job_category') }}
            {{ Form::select('job_category',
            ["Architecture and engineering" => "Architecture and engineering", "Arts, culture and entertainment" => "Arts, culture and entertainment", "Business" => "Business", "Communications" => "Communications", "Community and social services" => "Community and social services", "Education" => "Education", "Farming, fishing and forestry" => "Farming, fishing and forestry", "Government" => "Government", "Healthcare" => "Healthcare", "Installation, repairs and maintenance" => "Installation, repairs and maintenance", "Law" => "Law", "Media and entertainment" => "Media and entertainment", "Sales" => "Sales", "Science and technology" => "Science and technology"],
            $jobPost->job_category, ['class' => 'form-control' . ($errors->has('job_category') ? ' is-invalid' : ''), 'placeholder' => 'Choose a category']) }}
            {!! $errors->first('job_category', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('job_subcategory') }}
            {{ Form::text('job_subcategory', $jobPost->job_subcategory, ['class' => 'form-control' . ($errors->has('job_subcategory') ? ' is-invalid' : ''), 'placeholder' => 'Job Subcategory']) }}
            {!! $errors->first('job_subcategory', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('position_name') }}
            {{ Form::text('position_name', $jobPost->position_name, ['class' => 'form-control' . ($errors->has('position_name') ? ' is-invalid' : ''), 'placeholder' => 'Position Name']) }}
            {!! $errors->first('position_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('position_description') }}
            {{ Form::text('position_description', $jobPost->position_description, ['class' => 'form-control' . ($errors->has('position_description') ? ' is-invalid' : ''), 'placeholder' => 'Position Description']) }}
            {!! $errors->first('position_description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('company_id', 'Company') }}
            {{ Form::select('company_id', $companies, $jobPost->company_id, ['class' => 'form-control' . ($errors->has('company_id') ? ' is-invalid' : ''), 'placeholder' => 'Company']) }}
            {!! $errors->first('company_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('work_modality') }}
            {{ Form::select('work_modality', ['Remote' => 'Remote', 'In Person' => 'In Person', 'Hybrid' => 'Hybrid'], $jobPost->work_modality, ['class' => 'form-control' . ($errors->has('work_modality') ? ' is-invalid' : ''), 'placeholder' => 'Choose a modality']) }}
            {!! $errors->first('work_modality', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('job_location') }}
            {{ Form::text('job_location', $jobPost->job_location, ['class' => 'form-control' . ($errors->has('job_location') ? ' is-invalid' : ''), 'placeholder' => 'Job Location']) }}
            {!! $errors->first('job_location', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('job_salary') }}
            {{ Form::text('job_salary', $jobPost->job_salary, ['class' => 'form-control' . ($errors->has('job_salary') ? ' is-invalid' : ''), 'placeholder' => 'Job Salary']) }}
            {!! $errors->first('job_salary', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('keywords') }}
            {{ Form::text('keywords', $jobPost->keywords, ['class' => 'form-control' . ($errors->has('keywords') ? ' is-invalid' : ''), 'placeholder' => 'Keywords']) }}
            {!! $errors->first('keywords', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>