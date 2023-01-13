@extends('adminlte::page')

@section('content_header')
    <h1> Create Document Type</h1>
@stop



@section('template_title')
    Create Document Type
@endsection

@section('content')
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

                            @include('document-type.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
@endsection
