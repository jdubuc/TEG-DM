@extends ('admin/layout')

<?php

    if ($citas->exists):
        $form_data = array('route' => array('admin.citas.update', $citas->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'admin.citas.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@if ($action == 'Editar')  
{{ Form::model($citas, array('route' => array('admin.citas.destroy', $citas->id), 'method' => 'DELETE', 'role' => 'form')) }}
  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::submit('Eliminar cita', array('class' => 'btn btn-danger')) }}
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

<h1>{{ $action }} Cita</h1>

{{ Form::model($citas, $form_data, array('role' => 'form')) }}

  @include ('admin/errors', array('errors' => $errors))

  <div class="row">
    <div class="form-group col-md-4">
          <?php
              $users = User::orderBy('nombre')->get();
          ?>
          <select name="User" >
            @foreach ($users as $users)
                <option value="{{$users->id}}">Dr {{$users->nombre}} {{$users->apellido}} valor: {{$users->id}}</option>  
            @endforeach
          </select>   
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('cedula_paciente', 'cedula paciente') }}
      {{ Form::text('cedula_paciente', null, array('placeholder' => 'cedula del paciente', 'class' => 'form-control')) }}
    </div>
    
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('nombre_paciente', 'Nombre y apellido del paciente') }}
      {{ Form::text('nombre_paciente', null, array('placeholder' => 'Introduce nombre y apellido del paciente', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('numero_expediente_paciente', 'Numero expediente paciente') }}
      {{ Form::text('numero_expediente_paciente', null, array('placeholder' => 'Introduce numero de expediente paciente', 'class' => 'form-control')) }}
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('razon_cita', 'razon cita') }}
      {{ Form::text('razon_cita', null, array('placeholder' => 'Introduce razon de la cita', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('hora', 'Hora') }}
        {{ Form::text('hora', null, array('placeholder' => 'HH:MM AM,PM', 'class' => 'form-control')) }}
      </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('fecha_cita', 'Fecha Cita') }}
        {{ Form::input('date','fecha_cita', null, array('placeholder' => 'DD:MM:AA', 'class' => 'form-control')) }}
      </div>
  </div>
 
  {{ Form::button('Crear cita', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop