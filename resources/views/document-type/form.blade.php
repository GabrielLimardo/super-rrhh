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
        <div class="col-12 mt-2">
            <input name="listField" type="text" class="listField" id="listField">
        </div>
        
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


 
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

<style>
    #listField {
        display: none;
    }
    #listField {
        visibility: hidden;
    }
</style>


@section('js')

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



