@extends('adminlte::page')

@section('content_header')
    <h1> Create Role</h1>
@stop

@section('template_title')
    Create Role
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Role</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        {{ Form::label('name') }}
                                        {{ Form::text('name', $role->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('organization') }}
                                        {{ Form::text('organization_id', $role->organization_id, ['class' => 'form-control' . ($errors->has('organization_id') ? ' is-invalid' : ''), 'placeholder' => 'organization_id']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                            
                                    <div class="form-group">
                                        {{ Form::label('document_see') }}
                                        {{ Form::number('document_see', $role->document_see, ['class' => 'form-control' . ($errors->has('document_see') ? ' is-invalid' : ''), 'placeholder' => 'document_see']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    @foreach ($permissions as $permission)
                                        <div class="checkbox icheck">
                                            <label>
                                            <input type="checkbox" name="permissions[]" id="permissions[]" value="{{$permission->id}}" >
                                            {{ $permission->name }}
                                        </label>
                                        </div>
                                    @endforeach
                            
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
