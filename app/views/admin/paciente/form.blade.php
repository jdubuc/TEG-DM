@extends ('user/layout')

<?php

    if ($paciente->exists):
        $form_data = array('route' => array('user.paciente.update', $paciente->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'user.paciente.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@if ($action == 'Editar')  
{{ Form::model($paciente, array('route' => array('user.paciente.destroy', $paciente->id), 'method' => 'DELETE', 'role' => 'form')) }}
  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::submit('Eliminar paciente', array('class' => 'btn btn-danger')) }}
    </div>
  </div>
{{ Form::close() }}
@endif

@section ('title') {{ $action }} paciente @stop

@if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Por favor corrige los siguentes errores:</strong>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif

@section ('content')

<h1>{{ $action }} Paciente</h1>

{{ Form::model($paciente, $form_data, array('role' => 'form')) }}

  @include ('user/errors', array('errors' => $errors))

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('nombre', 'nombre') }}
      {{ Form::text('nombre', null, array('placeholder' => 'Introduce el nombre', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('apellido', 'Nombre de usuario') }}
      {{ Form::text('apellido', null, array('placeholder' => 'Introduce el apellido', 'class' => 'form-control')) }}        
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('cedula', 'cedula') }}
      {{ Form::text('cedula', null, array('placeholder' => 'Introduce la cedula','class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('Número de telefono', 'telefono') }}
      {{ Form::text('telefono', null, array('placeholder' => 'Introduce el número de telefono','class' => 'form-control')) }}
    </div>
  </div>

   <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('procedencia', 'procedencia') }}
      {{ Form::text('procedencia', null, array('placeholder' => 'Lugar de procedencia', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('Nombre y apellido del responsable', 'Nombre y apellido del responsable') }}
      {{ Form::text('responsable', null, array('placeholder' => 'Introduce Nombre y apellido del responsable', 'class' => 'form-control')) }}        
    </div>
   
     
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('Número de telefono del responsable', 'Número de telefono del responsable') }}
      {{ Form::text('tlf_responsable', null, array('placeholder' => 'Introduce Número de telefono del responsable', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('Correo electronico', 'Correo electronico') }}
      {{ Form::text('correo_electronico', null, array('placeholder' => 'Introduce el Correo electronico del paciente', 'class' => 'form-control')) }}        
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('informacion', 'informacion') }}
      {{ Form::text('informacion', null, array('placeholder' => 'Introduce informacion a mostrar', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('alergias', 'alergias') }}
      {{ Form::text('alergias', null, array('placeholder' => 'Introduce las alergias del paciente', 'class' => 'form-control')) }}        
    </div>
  </div>
  <div class="row">
      <div class="form-group col-md-4">
        {{ Form::label('Número de registro del paciente', 'Número de registro del paciente') }}
        {{ Form::text('num_registro', null, array('placeholder' => 'Introduce el Número de registro del paciente', 'class' => 'form-control')) }}
      </div>
      <div class="form-group col-md-4">
        
        
        
      </div>
  </div>
  {{ Form::button('Crear paciente', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop