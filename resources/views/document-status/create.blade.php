@extends('layouts.app')

@section('template_title')
    Create Document Status
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Document Status</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('document-statuses.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('document-status.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
