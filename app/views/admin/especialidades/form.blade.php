@extends ('admin/layout')

<?php

    if ($especialidades->exists):
        $form_data = array('route' => array('admin.especialidades.update', $especialidades->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'admin.especialidades.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@if ($action == 'Editar')  
{{ Form::model($especialidades, array('route' => array('admin.especialidades.destroy', $especialidades->id), 'method' => 'DELETE', 'role' => 'form')) }}
  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::submit('Eliminar especialidad', array('class' => 'btn btn-danger')) }}
    </div>
  </div>
{{ Form::close() }}
@endif

@section ('title') {{ $action }} Especialidades @stop

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

<h1>{{ $action }} Especialidades</h1>

{{ Form::model($especialidades, $form_data, array('role' => 'form')) }}

  @include ('admin/errors', array('errors' => $errors))

  <div class="row">
   <div class="form-group col-md-4">
      {{ Form::label('especialidad', 'nombre especialidad') }}
      {{ Form::text('nombre', null, array('placeholder' => 'Introduce la especialidad', 'class' => 'form-control')) }}
    </div>
</div>
  {{ Form::button('Crear especialidad', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop