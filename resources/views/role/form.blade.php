<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $role->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>



        @foreach ($permissions as $permission)
            <div class="checkbox icheck">
                <label>
                {{Form::checkbox('permissions[]',
                    $permission->id, $role->permissions,
                    $role->id === 1 && $permission->id === 1 ? array('disabled') : false ) }}
                {{ $permission->name }}
            </label>
            </div>
		@endforeach

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>