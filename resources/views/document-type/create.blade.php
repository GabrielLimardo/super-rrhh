
@extends('adminlte::page')

@section('content_header')
    <h1> Create Document Type</h1>
@stop



@section('template_title')
    Create Document Type
@endsection

@section('content')
<!-- STYLES -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- pdfjs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js" integrity="sha512-tqaIiFJopq4lTBmFlWF0MNzzTpDsHyug8tJaaY0VkcH5AR2ANMJlcD+3fIL+RQ4JU3K6edt9OoySKfCCyKgkng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://unpkg.com/jcrop/dist/jcrop.css">
<script src="https://unpkg.com/jcrop"></script>


{{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Document Type</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('document-types.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            {{-- @include('document-type.form') --}}

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
                                    {{-- <div class="form-group">
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
                                    </div> --}}
                                   
                                    <!-- Flujo documentos-->
                                    <div class="col-12 mt-2">
                                        <label class="label subtitulo">Flujo del documento</label>
                                        <hr>
                                    </div>
                            
                            
                            
                                    <div class="row">
                                        <div class="form-group col-11">
                            
                                            <select name="id_estados" id="myList" class="col form-control selectpicker" data-Live-search="true">
                                                @foreach($states as $status)
                                                    <option value="{{ $status->id }}">
                                                        {{ $status->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-1">
                                            <button type="button" id="selectBtn"   class="btn btn-primary btn-estados"> <i class="fa fa-plus" aria-hidden="true"></i> </button>
                                        </div>
                            
                            
                                        
                            
                            
                                        <div class="col-2">
                                        </div>
                                        {{-- <button class="btn btn-primary" > Seleccionar </button> --}}
                                    </div>
                                       
                            
                                        <table class="table" id="table">
                                            <thead>
                                              <tr>
                                                <th>Número</th>
                                                <th>Elemento</th>
                                                <th>id</th>
                                              </tr>
                                            </thead>
                                            <tbody id="selectedList">
                                            </tbody>
                                          </table>
                            
                            
                            
                            
                                           <div class="col-12 mt-2">
                                        <div class="flujo">
                                        </div>
                                    </div> 
                            
                            
                                    <div class="col-12 mt-2">
                                        <label class="label subtitulo">Generación de coordenadas</label>
                                        <hr>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <label for="file" id="textfile" class="boton_adjuntar"><i class="fas fa-paperclip"> </i> Subir pdf</label>
                                        <input id="file" type="file" class="form-control" name="file">
                                    </div>
                                    <br>
                                    <!-- Aquí se renderiza la imagen -->
                                    <div class="d-flex justify-content-center">
                                        <canvas style="display: none;" id="pdf_canvas"></canvas>
                                        <img id="img" src="" alt="">
                                    </div>
                                    <br>
                            
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
                                                            <input type="int" autocomplete="off" class="col form-control" value="{{ old('c_up_left_x') }}" id="c_up_left_x" name="c_up_left_x" placeholder="Coordenada X punto izquierdo superior">
                                                            <label>Coordenada X punto izquierdo superior</label>
                                                        </div>
                                                        <div class="col-md-6 form-floating mb-1">
                                                            <input type="int" autocomplete="off" class="col form-control" value="{{ old('c_up_left_y') }}" id="c_up_left_y" name="c_up_left_y" placeholder="Coordenada Y punto izquierdo superior">
                                                            <label>Coordenada Y punto izquierdo superior</label>
                                                        </div>
                                                    </div>
                            
                                                    <div class="d-flex">
                                                        <div class="col-md-6 form-floating mb-1">
                                                            <input type="int" autocomplete="off" class="col form-control" value="{{ old('c_down_right_x') }}" id="c_down_right_x" name="c_down_right_x" placeholder="Coordenada X punto derecho inferior">
                                                            <label>Coordenada X punto derecho inferior</label>
                                                        </div>
                                                        <div class="col-md-6 form-floating mb-1">
                                                            <input type="int" autocomplete="off" class="col form-control" value="{{ old('c_down_right_y') }}" id="c_down_right_y" name="c_down_right_y" placeholder="Coordenada Y punto izquierdo inferior">
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
                                                            <input type="int" autocomplete="off" class="col form-control" value="{{ old('sign_father_x') }}" id="sign_father_x" name="sign_father_x" placeholder="Coordenada Empleador X">
                                                            <label>Coordenada Empleador X</label>
                                                        </div>
                                                        <div class="col-md-6 form-floating mb-1">
                                                            <input type="int" autocomplete="off" class="col form-control" value="{{ old('sign_father_y') }}" id="sign_father_y" name="sign_father_y" placeholder="Coordenada Empleador Y">
                                                            <label>Coordenada Empleador Y</label>
                                                        </div>
                                                    </div>
                            
                                                    <div class="d-flex">
                                                        <div class="col-md-6 form-floating mb-1">
                                                            <input type="int" autocomplete="off" class="col form-control" value="{{ old('sign_father_high') }}" id="sign_father_high" name="sign_father_high" placeholder="Alto Empleador">
                                                            <label>Alto P/Firma Empleador</label>
                                                        </div>
                                                        <div class="col-md-6 form-floating mb-1">
                                                            <input type="int" autocomplete="off" class="col form-control" value="{{ old('sign_father_wide') }}" id="sign_father_wide" name="sign_father_wide" placeholder="Ancho Empleador">
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
                                                            <input type="int" autocomplete="off" class="col form-control" value="{{ old('sign_son_x') }}" id="sign_son_x" name="sign_son_x" placeholder="Coordenada Empleado X">
                                                            <label>Coordenada Empleado X</label>
                                                        </div>
                                                        <div class="col-md-6 form-floating mb-1">
                                                            <input type="int" autocomplete="off" class="col form-control" value="{{ old('sign_son_y') }}" id="sign_son_y" name="sign_son_y" placeholder="Coordenada Empleado Y">
                                                            <label>Coordenada Empleado Y</label>
                                                        </div>
                                                    </div>
                            
                                                    <div class="d-flex">
                                                        <div class="col-md-6 form-floating mb-1">
                                                            <input type="int" autocomplete="off" class="col form-control" value="{{ old('sign_son_high') }}" id="sign_son_high" name="sign_son_high" placeholder="Alto Empleador">
                                                            <label>Alto P/Firma Empleado</label>
                                                        </div>
                                                        <div class="col-md-6 form-floating mb-1">
                                                            <input type="int" autocomplete="off" class="col form-control" value="{{ old('sign_son_wide') }}" id="sign_son_wide" name="sign_son_wide" placeholder="Ancho Empleador">
                                                            <label>Ancho P/Firma Empleado</label>
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

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection





@section('js')



<script>
    let pdfDoc = null,
    pageNum = 1,
    pageRendering = false,
    pageNumPending = null,
    scale = 1,
    canvas = document.getElementById('pdf_canvas'),
    ctx = canvas.getContext('2d');

function generateImage(pageNum) {

    pdfDoc.getPage(pageNum).then((page) => {
        var viewport = page.getViewport({
            scale: 10
        });
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');
        canvas.height = viewport.height;
        canvas.width = viewport.width;
        var renderContext = {
            canvasContext: ctx,
            viewport: viewport
        };
        var renderTask = page.render(renderContext);
        renderTask.promise.then(function() {
            var img = canvas.toDataURL('image/png');
            var viewport = page.getViewport({
                scale: scale
            });

            const image = document.getElementById('img')
            image.src = img;
            image.style.width = viewport.width + 'px';
            image.style.height = viewport.height + 'px';

            jcropConfig();

        });
    }).catch(function(error) {
        console.log(error);
    });
}

$('#file').on('change', function(e) {
    e.preventDefault();
    var file = $('#file')[0].files[0].name;
    $(this).prev('label').text(file);

    let url = URL.createObjectURL($('#file')[0].files[0]);

    // load the pdf
    pdfjsLib.getDocument(url).promise.then((doc) => {
        pdfDoc = doc;
        generateImage(1);
    })
});

// jcrop configuration function
function jcropConfig() {

    const jcrop = Jcrop.attach('img', {
        shadeColor: 'red',
        multi: false
    })

    // jcrop configuration
    jcrop.listen('crop.update', (widget, e) => {

        var img = document.getElementById('img');
        var img_width = img.width;
        var img_height = img.height;

        console.log(widget.pos);


        //  si el botón está activo agrego los valores al input
        if ($('#ocr-button').attr('aria-expanded') == 'true') {
            document.getElementById('c_arriba_izquierda_x').value = widget.pos.x;
            document.getElementById('c_arriba_izquierda_y').value = img_height - widget.pos.y;
            document.getElementById('c_abajo_derecha_x').value = widget.pos.x + widget.pos.w;
            document.getElementById('c_abajo_derecha_y').value = img_height - (widget.pos.y + widget.pos.h);
        }


    });
}
            // if ($('#empleador-button').attr('aria-expanded') == 'true') {
        //     document.getElementById('c_empleador_x').value = widget.pos.x;
        //     document.getElementById('c_empleador_y').value = -widget.pos.y;
        //     document.getElementById('alto_empleador').value = widget.pos.h;
        //     document.getElementById('ancho_empleador').value = widget.pos.w;
        // }

        // if ($('#empleado-button').attr('aria-expanded') == 'true') {
        //     document.getElementById('c_empleado_x').value = widget.pos.x;
        //     document.getElementById('c_empleado_y').value = -widget.pos.y;
        //     document.getElementById('alto_empleado').value = widget.pos.h;
        //     document.getElementById('ancho_empleado').value = widget.pos.w;
        // }

</script>

<script>
    // Inicializar una variable para almacenar el número de elementos seleccionados
    var count = 0;
    // Obtener el botón de selección
    var selectBtn = document.getElementById("selectBtn");

    // Agregar un evento al botón de selección
    selectBtn.addEventListener("click", function() {

    var index = document.getElementById("myList").value;

    // Obtener el elemento seleccionado en la lista desplegable
    var selectedItem = document.getElementById("myList");

    // Obtener el índice de la opción seleccionada
    var selectedIndex = selectedItem.selectedIndex;


    // Obtener el objeto option de la opción seleccionada
    var selectedOption = selectedItem.options[selectedIndex];


    var selectedName = selectedOption.text;

    console.log(index);
    // Verificar si se ha seleccionado un elemento
    if (selectedName) {
        // Aumentar el contador de elementos seleccionados
        count++;

        // Crear una fila para mostrar el elemento seleccionado
        var row = document.createElement("tr");

        // Crear una celda para mostrar el número de elemento
        var numCell = document.createElement("td");

        numCell.innerHTML = count + "º";
        
        // Crear una celda para mostrar el nombre del elemento
        var itemCell = document.createElement("td");
        itemCell.innerHTML = selectedName;

        // Crear una celda para mostrar el numero del elemento
        var index_item = document.createElement("td");
        index_item.innerHTML = index;


        // Agregar las celdas a la fila
        row.appendChild(numCell);
        row.appendChild(itemCell);
        row.appendChild(index_item);

        // Agregar la fila a la tabla de elementos seleccionados
        document.getElementById("selectedList").appendChild(row);
    }

        // Obtener una referencia a la tabla
        var table = document.getElementById("table");

        // Seleccionar todas las celdas de la columna específica (en este caso la primera columna)
        var cells = table.querySelectorAll("td:nth-child(3)");

        // Crear una lista vacía para almacenar los valores de las celdas
        var list = [];

        // Iterar a través de las celdas seleccionadas
        for (var i = 0; i < cells.length; i++) {
        // Agregar el valor de la celda actual a la lista
        list.push(cells[i].innerHTML);
        }
        console.log(list);

        // Obtener una referencia al campo de texto donde se almacenará la lista
        var listField = document.getElementById("listField");

        // Asignar la lista creada anteriormente al campo de texto
        listField.value = list.join(',');

        // Obtener una referencia al formulario
        var form = document.getElementById("myForm");

        // Agregar un escuchador de eventos al formulario para enviar los datos al servidor
        form.addEventListener("submit", function(event) {
        event.preventDefault();

        // Enviar los datos del formulario al servidor (puedes utilizar cualquier librería o método para hacerlo, como Fetch o XMLHttpRequest)
        // ...

        // Limpiar el campo de texto después de enviar los datos
        listField.value = "";
        });
    });


    


</script>
@endsection
