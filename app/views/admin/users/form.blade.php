@extends ('admin/layout')

<?php

    if ($user->exists):
        $form_data = array('route' => array('admin.users.update', $user->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'admin.users.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@if ($action == 'Editar')  
{{ Form::model($user, array('route' => array('admin.users.destroy', $user->id), 'method' => 'DELETE', 'role' => 'form')) }}
  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::submit('Eliminar usuario', array('class' => 'btn btn-danger')) }}
    </div>
  </div>
{{ Form::close() }}
@endif

@section ('title') {{ $action }} Usuarios @stop

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

<h1>{{ $action }} Usuarios</h1>

{{ Form::model($user, $form_data, array('role' => 'form')) }}

  @include ('admin/errors', array('errors' => $errors))

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('email', 'Dirección de E-mail') }}
      {{ Form::text('email', null, array('placeholder' => 'Introduce tu E-mail', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('username', 'Nombre de usuario') }}
      {{ Form::text('username', null, array('placeholder' => 'Introduce tu nombre de usuario', 'class' => 'form-control')) }}        
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('password', 'Contraseña') }}
      {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('password_confirmation', 'Confirmar contraseña') }}
      {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
    </div>
  </div>

   <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('nombre', 'nombre') }}
      {{ Form::text('nombre', null, array('placeholder' => 'Introduce tu Nombre', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('apellido', 'apellido') }}
      {{ Form::text('apellido', null, array('placeholder' => 'Introduce tu Apellido', 'class' => 'form-control')) }}        
    </div>
     
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('telefono1', 'telefono1') }}
      {{ Form::text('telefono1', null, array('placeholder' => 'Introduce telefono del consultorio', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('telefono2', 'telefono2') }}
      {{ Form::text('telefono2', null, array('placeholder' => 'Introduce otro telefono', 'class' => 'form-control')) }}        
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('informacion', 'informacion') }}
      {{ Form::text('informacion', null, array('placeholder' => 'Introduce informacion a mostrar', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('horario', 'horario') }}
      {{ Form::text('horario', null, array('placeholder' => 'Introduce horario de atencion', 'class' => 'form-control')) }}        
    </div>
  </div>
  <div class="row">
      <div class="form-group col-md-4">
        {{ Form::label('direccion', 'direccion') }}
        {{ Form::text('direccion', null, array('placeholder' => 'Introduce direccion en la clinica', 'class' => 'form-control')) }}
      </div>
      <div class="form-group col-md-4">
        
        {{ Form::open(array(
             'url'=>'upload/', 
             'method' => 'post',
             'enctype'=>'multipart/form-data'
        ) )}}

        {{ Form::file('foto') }}
        
        
      </div>
  </div>
  {{ Form::button('Crear usuario', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop