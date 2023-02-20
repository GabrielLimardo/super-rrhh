@extends('adminlte::page')

@section('title', 'Nuevo document-types')
<!-- STYLES -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- pdfjs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js" integrity="sha512-tqaIiFJopq4lTBmFlWF0MNzzTpDsHyug8tJaaY0VkcH5AR2ANMJlcD+3fIL+RQ4JU3K6edt9OoySKfCCyKgkng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- jcrop -->
<link rel="stylesheet" href="https://unpkg.com/jcrop/dist/jcrop.css">
<script src="https://unpkg.com/jcrop"></script>

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors -> all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- Banner -->
<div class="container-fluid mb-4">
    <div class="row img-clientes-banner">
        <!-- <img src="img/cartas_banner.png" class="banner" alt="Cartas"> -->
        <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 d-flex justify-content-end align-items-end pb-4">
            <h1 class="titulo_seccion">Tipos de Documentos</h1>
        </div>
    </div>
</div>


<div class="d-flex justify-content-center">
    <div class="col-md-8">
        <form class="form_cliente" method="POST" action="{{route('document-types.store')}}">
            @csrf

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
            <br>

            <!-- BOTONES -->
            <div class="row justify-content-center boton_proceso">
                <button class="col btn btn-primary" type="submit">Guardar</button>
            </div>
            <div class="row justify-content-center boton_cancelar">
                <a class="col btn" href="{{route('document-types.index')}}">Cancelar</a>
            </div>


            @if (session('msj2'))
            <div class="col-md-12">

                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <div>
                        {{ session('msj2') }}
                    </div>
                </div>
            </div>

            @endif

            @if (session('msj1'))
            <div class="col-md-12">

                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <div>

                        @foreach (session('msj1') as $item)

                        Legajo <b>{{ $item}}</b> no encontrado! <br>

                        @endforeach
                    </div>
                </div>
            </div>

            @endif



        </form>
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

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">

</script>

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

            if ($('#empleador-button').attr('aria-expanded') == 'true') {
                document.getElementById('c_empleador_x').value = widget.pos.x;
                document.getElementById('c_empleador_y').value = -widget.pos.y;
                document.getElementById('alto_empleador').value = widget.pos.h;
                document.getElementById('ancho_empleador').value = widget.pos.w;
            }

            if ($('#empleado-button').attr('aria-expanded') == 'true') {
                document.getElementById('c_empleado_x').value = widget.pos.x;
                document.getElementById('c_empleado_y').value = -widget.pos.y;
                document.getElementById('alto_empleado').value = widget.pos.h;
                document.getElementById('ancho_empleado').value = widget.pos.w;
            }

        });
    }
</script>

<script>
    $('#periodo').on('click', function() {
        if ($(this).is(':checked')) {
            $('.periodo-check').prop("disabled", false);
        } else {
            $('.periodo-check').prop("disabled", true);
        }
    });


    let estados = []

    $(document).ready(function() {

        $('.btn-estados').click(function() {


            let estado = $('#id_estados').val()

            let filter = estados.find(element => element == estado)

            console.log("existe: " + filter)

            if (!filter) {
                estados.push(estado)
            }

            bubbleSort(estados)
            drawEstados()

        });


        $('.admin').change(function() {
            $('.firmantes').slideToggle()
        })

    });


    function eliminar(index) {
        estados.splice(index - 1, 1)
        drawEstados()
    }


    function drawEstados() {

        if (estados.length > 0) {

            $.ajax({
                url: 'estado',
                method: 'POST',
                data: {
                    estados: estados,
                    _token: $('input[name="_token"]').val()
                }

            }).done(function(res) {

                let response = JSON.parse(res)
                cont = 0,
                    template = `<div class="estados">`

                console.log(response.length)

                response.forEach(estado => {
                    cont++
                    template += `<div class="contenido">`
                    template += `  <div class="estado"><span>${cont}</span><span>${estado.nombre}</span><i onclick="eliminar(${cont})"  class="btn-eliminar fas fa-times-circle "></i></div>`

                    if (cont != response.length) {
                        template += `  <div class="flecha"><i class="fas fa-long-arrow-alt-right"></i></div>`
                    }

                    template += `</div>`
                });

                template += `</div>`
                $('.flujo').html(template);

            });

        } else {
            $('.flujo').html("");
        }
    }


    function bubbleSort(items) {

        var length = items.length;
        for (var i = 0; i < length; i++) {
            for (var j = 0; j < (length - i - 1); j++) {
                if (items[j] > items[j + 1]) {
                    var tmp = items[j];
                    items[j] = items[j + 1];
                    items[j + 1] = tmp;
                }
            }
        }
    }
</script>

<script>
    function autocompletarRegex() {
      const inputRegex = document.getElementById('regex');
      const selectFormatos = document.getElementById('formatos');
      const formatoSeleccionado = selectFormatos.value;
  
      if (formatoSeleccionado) {
        inputRegex.value = formatoSeleccionado;
      }
    }
  </script>
@endsection
