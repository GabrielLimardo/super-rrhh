@extends('layouts.app')

@section('template_title')
    Job Post
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Job Post') }}
                            </span>
                             <div class="float-right">
                                <a href="{{ route('job-posts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                {{-- TODO: search view  --}}
                  {{-- <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Filter by') }}
                            </span>
                            <div class="box-body">
                                <div id="filter-container">
                                <form method="GET" action="{{ route('posts-search') }}">
                                    <div class="form-group">
                                    <select id="filter-param" onchange="generateFilterInputs()">
                                        <option value="">Select a parameter</option>
                                        <option value="job_category">Job category</option>
                                        <option value="job_subcategory">Job subcategory</option>
                                        <option value="position_name">Position name</option>
                                        <option value="position_description">Position description</option>
                                        <option value="company_id">Company name</option>
                                        <option value="work_modality">Work modality</option>
                                        <option value="job_location">Job location</option>
                                        <option value="job_salary">Job salary</option>
                                        <option value="keywords">Keywords</option>
                                    </select>  
                                    </div> --}}
                                    {{-- <div class="form-group">
                                        {{ Form::label('job_category') }}
                                        {{ Form::select('job_category',
                                        [""=>"Select a Job Category",
                                        "Architecture and engineering" => "Architecture and engineering",
                                        "Arts, culture and entertainment" => "Arts, culture and entertainment",
                                        "Business" => "Business",
                                        "Communications" => "Communications",
                                        "Community and social services" => "Community and social services",
                                        "Education" => "Education",
                                        "Farming, fishing and forestry" => "Farming, fishing and forestry",
                                        "Government" => "Government",
                                        "Healthcare" => "Healthcare",
                                        "Installation, repairs and maintenance" => "Installation, repairs and maintenance",
                                        "Law" => "Law",
                                        "Media and entertainment" => "Media and entertainment",
                                        "Sales" => "Sales",
                                        "Science and technology" => "Science and technology"],
                                        ['class' => 'form-control' . ($errors->has('job_category') ? ' is-invalid' : ''),
                                        'placeholder' => 'Choose a category',
                                        'id' => 'job_category',
                                        'name' => 'hasfilter[job_category]'
                                        ])
                                        }}                                         
                                    </div>
                                        <div class="form-group">
                                            {{ Form::label('job_subcategory') }}
                                            {{ Form::text('job_subcategory', '', [
                                                'class' => 'form-control' . ($errors->has('job_subcategory') ? ' is-invalid' : ''),
                                            'placeholder' => 'Enter the job subcategory',
                                            'id' => 'job_subcategory',
                                            'name' => 'hasfilter[job_subcategory]'
                                            ]) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('position_name') }}
                                            {{ Form::text('position_name', '', [
                                                'class' => 'form-control' . ($errors->has('position_name') ? ' is-invalid' : ''),
                                            'placeholder' => 'Enter the position name',
                                            'id' => 'position_name',
                                            'name' => 'hasfilter[position_name]'
                                            ]) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('position_description') }}
                                            {{ Form::text('position_description', '', [
                                                'class' => 'form-control' . ($errors->has('position_description') ? ' is-invalid' : ''),
                                            'placeholder' => 'Enter the position description',
                                            'id' => 'position_description',
                                            'name' => 'hasfilter[position_description]'
                                            ]) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('company_id') }}
                                            {{ Form::text('company_id', '', [
                                                'class' => 'form-control' . ($errors->has('company_id') ? ' is-invalid' : ''),
                                            'placeholder' => 'Enter the Fantasy Name',
                                            'id' => 'company_id',
                                            'name' => 'hasfilter[company_id]'
                                            ]) }}
                                        </div>
                                    <div class="form-group">
                                        {{ Form::label('work_modality') }}
                                        {{ Form::select('work_modality',
                                        [""=>"Select a Work Modality",
                                        "Remote" => "Remote",
                                        "In Person" => "In Person",
                                        "Hybrid" => "Hybrid"],
                                        ['class' => 'form-control' . ($errors->has('work_modality') ? ' is-invalid' : ''),
                                        'placeholder' => 'Choose a work modality',
                                        'id' => 'work_modality',
                                        'name' => 'hasfilter[work_modality]'
                                        ])  }}    
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('job_location') }}
                                        {{ Form::text('job_location', '', [
                                                'class' => 'form-control' . ($errors->has('job_location') ? ' is-invalid' : ''),
                                            'placeholder' => 'Enter the job location',
                                            'id' => 'job_location',
                                            'name' => 'hasfilter[job_location]'
                                            ]) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('job_salary', 'Job Salary') }}
                                        {{ Form::select('job_salary_operator',
                                        ["<" => "<",
                                        ">" => ">"],
                                        [   'class'    => 'form-control' . ($errors->has('job_salary_operator') ? ' is-invalid' : ''),
                                            'id'       => 'job_salary_operator',
                                            'name' => 'hasfilter[job_salary][operator]'
                                         ],
                                        ['class' => 'form-control' . ($errors->has('job_salary') ? ' is-invalid' : ''),
                                        'placeholder' => 'Choose an operator',
                                        'id' => 'job_salary',
                                        'name' => 'hasfilter[job_salary][operator]'
                                        ])  }}  
                                        {{ Form::hidden('job_salary_operator', '', ['id' => 'job_salary_operator_hidden']) }} 
                                        {{ Form::text('job_salary_value', '', [
                                            'class'    => 'form-control' . ($errors->has('job_salary_value') ? ' is-invalid' : ''),
                                            'id'       => 'job_salary_value',
                                             'placeholder' => 'Enter job salary',
                                            'name'     => 'hasfilter[job_salary][value]',
                                            'type' => 'number'
                                        ])  }}   
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('keywords') }}
                                        {{ Form::text('keywords', '', [
                                                'class' => 'form-control' . ($errors->has('keywords') ? ' is-invalid' : ''),
                                            'placeholder' => 'Enter a keyword',
                                            'id' => 'keywords',
                                            'name' => 'hasfilter[keywords]'
                                            ]) }}
                                    </div> --}}
                                {{-- </div> --}}
                            {{-- <div class="box-footer mt20">
                                    <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                </form>--}}
            </div>
            </div>
        </div>
    </div>     
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Job Category</th>
										<th>Job Subcategory</th>
										<th>Position Name</th>
										<th>Position Description</th>
										<th>Company Name</th>
										<th>Work Modality</th>
										<th>Job Location</th>
										<th>Job Salary</th>
										{{-- <th>Keywords</th> --}}

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0 @endphp
                                    @foreach ($jobPosts as $jobPost)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $jobPost->job_category }}</td>
											<td>{{ $jobPost->job_subcategory }}</td>
											<td>{{ $jobPost->position_name }}</td>
											<td>{{ $jobPost->position_description }}</td>
											<td>{{ $jobPost->company->fantasy_name }}</td>
											<td>{{ $jobPost->work_modality }}</td>
											<td>{{ $jobPost->job_location }}</td>
											<td>{{ $jobPost->job_salary }}</td>
											{{-- <td>{{ $jobPost->keywords }}</td> --}}

                                            <td>
                                                <form action="{{ route('job-posts.destroy',$jobPost->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('job-posts.show',$jobPost->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('job-posts.edit',$jobPost->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $jobPosts->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
