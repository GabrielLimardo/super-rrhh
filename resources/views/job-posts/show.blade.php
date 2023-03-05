@extends('layouts.app')

@section('template_title')
    {{ $jobPost->name ?? 'Show Job Post' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Job Post</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('job-posts.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Job Category:</strong>
                            {{ $jobPost->job_category }}
                        </div>
                        <div class="form-group">
                            <strong>Job Subcategory:</strong>
                            {{ $jobPost->job_subcategory }}
                        </div>
                        <div class="form-group">
                            <strong>Position Name:</strong>
                            {{ $jobPost->position_name }}
                        </div>
                        <div class="form-group">
                            <strong>Position Description:</strong>
                            {{ $jobPost->position_description }}
                        </div>
                        <div class="form-group">
                            <strong>Company Id:</strong>
                            {{ $jobPost->company_id }}
                        </div>
                        <div class="form-group">
                            <strong>Work Modality:</strong>
                            {{ $jobPost->work_modality }}
                        </div>
                        <div class="form-group">
                            <strong>Job Location:</strong>
                            {{ $jobPost->job_location }}
                        </div>
                        <div class="form-group">
                            <strong>Job Salary:</strong>
                            {{ $jobPost->job_salary }}
                        </div>
                        <div class="form-group">
                            <strong>Keywords:</strong>
                            {{ $jobPost->keywords }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
