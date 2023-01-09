@extends('adminlte::page')

@section('content_header')
    <h1> Update Role</h1>
@stop


@section('template_title')
    Update Role
@endsection

@section('content')

    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Role</span>
                    </div>
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.update', $role->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
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
                                    
                                    <label>
                                        <input title="Seleccionar todo" class="check" type="checkbox" value="" id="checkbox-all">
                                            Select all
                                    </label>
                                    @foreach($permissions->chunk(10) as $chunkpermission)
                                        <div class="row">
                                            @foreach ($chunkpermission as $permission)
                                                <div class="col-md-6">
                                                    <div class="checkbox icheck">
                                                        <label>
                                                        <input type="checkbox" class="checkbox-admin" name="permissions[]" id="permissions[]" value="{{$permission->id}}" {{ $role->hasPermissionTo($permission->name) ? 'checked'  : '' }}>
                                                        {{ $permission->name }}
                                                    </label>
                                                    </div>
                                                </div>
                                            @endforeach
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


@section('js')


<script>

    // Lógica checkall
    $(function () {
        $('.check').on('click', function () {
            $('.checkbox-admin').each(function(){ this.checked =  'checked' ; });
        });
    });


</script>


@endsection