@extends('layouts.app')

@section('template_title')
    Create Organization Config
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Organization Config</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('organization-configs.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('organization-config.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
