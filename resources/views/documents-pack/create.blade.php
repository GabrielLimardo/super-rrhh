@extends('layouts.app')

@section('template_title')
    Create Documents Pack
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Documents Pack</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('documents-packs.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('documents-pack.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
