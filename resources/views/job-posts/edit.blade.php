@extends('layouts.app')de

@section('template_title')
    Update Job Post
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Job Post</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('job-posts.update', $jobPost->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('job-posts.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
