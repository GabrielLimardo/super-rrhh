<div class="box box-info padding-1">
    <div class="box-body">
        
        {{-- <div class="form-group">
            {{ Form::label('organization_id') }}
            {{ Form::text('organization_id', $documentType->organization_id, ['class' => 'form-control' . ($errors->has('organization_id') ? ' is-invalid' : ''), 'placeholder' => 'Organization Id']) }}
            {!! $errors->first('organization_id', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $documentType->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('period') }}
            {{ Form::text('period', $documentType->period, ['class' => 'form-control' . ($errors->has('period') ? ' is-invalid' : ''), 'placeholder' => 'Period']) }}
            {!! $errors->first('period', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_first_rol_id') }}
            {{ Form::text('sign_first_rol_id', $documentType->sign_first_rol_id, ['class' => 'form-control' . ($errors->has('sign_first_rol_id') ? ' is-invalid' : ''), 'placeholder' => 'Sign First Rol Id']) }}
            {!! $errors->first('sign_first_rol_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('code') }}
            {{ Form::text('code', $documentType->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Code']) }}
            {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $documentType->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('masive') }}
            {{ Form::text('masive', $documentType->masive, ['class' => 'form-control' . ($errors->has('masive') ? ' is-invalid' : ''), 'placeholder' => 'Masive']) }}
            {!! $errors->first('masive', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('employee_see') }}
            {{ Form::text('employee_see', $documentType->employee_see, ['class' => 'form-control' . ($errors->has('employee_see') ? ' is-invalid' : ''), 'placeholder' => 'Employee See']) }}
            {!! $errors->first('employee_see', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('regex') }}
            {{ Form::text('regex', $documentType->regex, ['class' => 'form-control' . ($errors->has('regex') ? ' is-invalid' : ''), 'placeholder' => 'Regex']) }}
            {!! $errors->first('regex', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('c_up_left_x') }}
            {{ Form::text('c_up_left_x', $documentType->c_up_left_x, ['class' => 'form-control' . ($errors->has('c_up_left_x') ? ' is-invalid' : ''), 'placeholder' => 'C Up Left X']) }}
            {!! $errors->first('c_up_left_x', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('c_up_left_y') }}
            {{ Form::text('c_up_left_y', $documentType->c_up_left_y, ['class' => 'form-control' . ($errors->has('c_up_left_y') ? ' is-invalid' : ''), 'placeholder' => 'C Up Left Y']) }}
            {!! $errors->first('c_up_left_y', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('c_down_right_x') }}
            {{ Form::text('c_down_right_x', $documentType->c_down_right_x, ['class' => 'form-control' . ($errors->has('c_down_right_x') ? ' is-invalid' : ''), 'placeholder' => 'C Down Right X']) }}
            {!! $errors->first('c_down_right_x', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('c_down_right_y') }}
            {{ Form::text('c_down_right_y', $documentType->c_down_right_y, ['class' => 'form-control' . ($errors->has('c_down_right_y') ? ' is-invalid' : ''), 'placeholder' => 'C Down Right Y']) }}
            {!! $errors->first('c_down_right_y', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_father_x') }}
            {{ Form::text('sign_father_x', $documentType->sign_father_x, ['class' => 'form-control' . ($errors->has('sign_father_x') ? ' is-invalid' : ''), 'placeholder' => 'Sign Father X']) }}
            {!! $errors->first('sign_father_x', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_father_y') }}
            {{ Form::text('sign_father_y', $documentType->sign_father_y, ['class' => 'form-control' . ($errors->has('sign_father_y') ? ' is-invalid' : ''), 'placeholder' => 'Sign Father Y']) }}
            {!! $errors->first('sign_father_y', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_father_high') }}
            {{ Form::text('sign_father_high', $documentType->sign_father_high, ['class' => 'form-control' . ($errors->has('sign_father_high') ? ' is-invalid' : ''), 'placeholder' => 'Sign Father High']) }}
            {!! $errors->first('sign_father_high', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_father_wide') }}
            {{ Form::text('sign_father_wide', $documentType->sign_father_wide, ['class' => 'form-control' . ($errors->has('sign_father_wide') ? ' is-invalid' : ''), 'placeholder' => 'Sign Father Wide']) }}
            {!! $errors->first('sign_father_wide', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_son_x') }}
            {{ Form::text('sign_son_x', $documentType->sign_son_x, ['class' => 'form-control' . ($errors->has('sign_son_x') ? ' is-invalid' : ''), 'placeholder' => 'Sign Son X']) }}
            {!! $errors->first('sign_son_x', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_son_y') }}
            {{ Form::text('sign_son_y', $documentType->sign_son_y, ['class' => 'form-control' . ($errors->has('sign_son_y') ? ' is-invalid' : ''), 'placeholder' => 'Sign Son Y']) }}
            {!! $errors->first('sign_son_y', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_son_high') }}
            {{ Form::text('sign_son_high', $documentType->sign_son_high, ['class' => 'form-control' . ($errors->has('sign_son_high') ? ' is-invalid' : ''), 'placeholder' => 'Sign Son High']) }}
            {!! $errors->first('sign_son_high', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sign_son_wide') }}
            {{ Form::text('sign_son_wide', $documentType->sign_son_wide, ['class' => 'form-control' . ($errors->has('sign_son_wide') ? ' is-invalid' : ''), 'placeholder' => 'Sign Son Wide']) }}
            {!! $errors->first('sign_son_wide', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!-- Flujo documentos-->
        <div class="col-12 mt-2">
            <label class="label subtitulo">Flujo del documento</label>
            <hr>
        </div>

        <div class="row">
            <div class="col-10 form-floating">
                <select name="id_estados" id="id_estados" class="form-input form-select select_width" data-Live-search="true">
                    @foreach($states as $status)
                    <option value="{{ $status->id }}" {{ old('id_estados') ? (old('id_estados') == $status->id ? 'selected' : '') : ($status->id == $status->id ? 'selected' : '') }}>
                        {{ $status->id }}-{{ $status->name }}
                    </option>
                    @endforeach
                </select>
                <label>Estados de Proceso</label>
            </div>

            <div class="col">
                <button type="button" class="btn btn-primary btn-estados" style="width:100%; height: 3.6em"> <i class="fa fa-plus" aria-hidden="true"></i> </button>
            </div>
        </div>


        <div class="col-12 mt-2">
            <div class="flujo">
            </div>
        </div>


        <!-- accordion para coordenadas-->
        <div class="accordion" id="acordionCoordenadas">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button id="ocr-button" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        OCR
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne" data-bs-parent="#acordionCoordenadas">
                    <div class="accordion-body">
                        <div class="d-flex">
                            <div class="col-md-6 form-floating mb-1">
                                <input type="int" autocomplete="off" class="col form-control" value="{{ old('c_arriba_izquierda_x') }}" id="c_arriba_izquierda_x" name="c_arriba_izquierda_x" placeholder="Coordenada X punto izquierdo superior">
                                <label>Coordenada X punto izquierdo superior</label>
                            </div>
                            <div class="col-md-6 form-floating mb-1">
                                <input type="int" autocomplete="off" class="col form-control" value="{{ old('c_arriba_izquierda_y') }}" id="c_arriba_izquierda_y" name="c_arriba_izquierda_y" placeholder="Coordenada Y punto izquierdo superior">
                                <label>Coordenada Y punto izquierdo superior</label>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-md-6 form-floating mb-1">
                                <input type="int" autocomplete="off" class="col form-control" value="{{ old('c_abajo_derecha_x') }}" id="c_abajo_derecha_x" name="c_abajo_derecha_x" placeholder="Coordenada X punto derecho inferior">
                                <label>Coordenada X punto derecho inferior</label>
                            </div>
                            <div class="col-md-6 form-floating mb-1">
                                <input type="int" autocomplete="off" class="col form-control" value="{{ old('c_abajo_derecha_y') }}" id="c_abajo_derecha_y" name="c_abajo_derecha_y" placeholder="Coordenada Y punto izquierdo inferior">
                                <label>Coordenada Y punto derecho inferior</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button id="empleador-button" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Coordenadas Empleador
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo" data-bs-parent="#acordionCoordenadas">
                    <div class="accordion-body">

                        <div class="d-flex mt-4">
                            <div class="col-md-6 form-floating mb-1">
                                <input type="int" autocomplete="off" class="col form-control" value="{{ old('c_empleador_x') }}" id="c_empleador_x" name="c_empleador_x" placeholder="Coordenada Empleador X">
                                <label>Coordenada Empleador X</label>
                            </div>
                            <div class="col-md-6 form-floating mb-1">
                                <input type="int" autocomplete="off" class="col form-control" value="{{ old('c_empleador_y') }}" id="c_empleador_y" name="c_empleador_y" placeholder="Coordenada Empleador Y">
                                <label>Coordenada Empleador Y</label>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-md-6 form-floating mb-1">
                                <input type="int" autocomplete="off" class="col form-control" value="{{ old('alto_empleador') }}" id="alto_empleador" name="alto_empleador" placeholder="Alto Empleador">
                                <label>Alto P/Firma Empleador</label>
                            </div>
                            <div class="col-md-6 form-floating mb-1">
                                <input type="int" autocomplete="off" class="col form-control" value="{{ old('ancho_empleador') }}" id="ancho_empleador" name="ancho_empleador" placeholder="Ancho Empleador">
                                <label>Ancho P/Firma Empleador</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button id="empleado-button" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        Coordenadas Empleado
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree" data-bs-parent="#acordionCoordenadas">
                    <div class="accordion-body">

                        <div class="d-flex">
                            <div class="col-md-6 form-floating mb-1">
                                <input type="int" autocomplete="off" class="col form-control" value="{{ old('c_empleado_x') }}" id="c_empleado_x" name="c_empleado_x" placeholder="Coordenada Empleado X">
                                <label>Coordenada Empleado X</label>
                            </div>
                            <div class="col-md-6 form-floating mb-1">
                                <input type="int" autocomplete="off" class="col form-control" value="{{ old('c_empleado_y') }}" id="c_empleado_y" name="c_empleado_y" placeholder="Coordenada Empleado Y">
                                <label>Coordenada Empleado Y</label>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-md-6 form-floating mb-1">
                                <input type="int" autocomplete="off" class="col form-control" value="{{ old('alto_empleado') }}" id="alto_empleado" name="alto_empleado" placeholder="Alto Empleador">
                                <label>Alto P/Firma Empleado</label>
                            </div>
                            <div class="col-md-6 form-floating mb-1">
                                <input type="int" autocomplete="off" class="col form-control" value="{{ old('ancho_empleado') }}" id="ancho_empleado" name="ancho_empleado" placeholder="Ancho Empleador">
                                <label>Ancho P/Firma Empleado</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>



<style>
   
    .estados {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 10px;
    }

    .estados .estado {
        background: #5994de;
        padding: 10px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        color: #fff;
        box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
        padding-right: 20px;
        position: relative;
        cursor: pointer;
        margin-left: 5px;
        width: 220px;
    }

    .estados .estado span:nth-child(1) {
        display: block;
        background: #fff;
        padding: 5px;
        width: 31px;
        padding-left: 11px;
        border-radius: 50px;
        margin-right: 12px;
        color: #5994de;
    }

    .estados .estado .fas {
        opacity: 0;
        position: absolute;
        top: 3px;
        right: 3px;
        transition: .5s;
    }

    .estados .estado .fas:hover {
        color: #fa7975;
        transform: scale3d(1.2, 1.2, 0.3);
    }

    .estados .estado:hover .fas {
        opacity: 1;
    }

    .firmantes {
        display: none;
    }

    .estados .flecha {
        font-size: 40px;
        color: #5994de;
        margin: auto;
        text-shadow: 1px 1px 5px rgba(0, 0, 0, .5);
    }

    .estados .contenido {
        display: flex;
    }
</style>
