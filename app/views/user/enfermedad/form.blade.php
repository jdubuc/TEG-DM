@extends ('user/layout')

<?php

    if ($enfermedad->exists):
        $form_data = array('route' => array('user.enfermedad.update', $enfermedad->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'user.enfermedad.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@if ($action == 'Editar')  
{{ Form::model($enfermedad, array('route' => array('user.enfermedad.destroy', $enfermedad->id), 'method' => 'DELETE', 'role' => 'form')) }}
  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::submit('Eliminar enfermedad', array('class' => 'btn btn-danger')) }}
    </div>
  </div>
{{ Form::close() }}
@endif

@section ('title') {{ $action }} enfermedad @stop

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

<h1>{{ $action }} enfermedad</h1>

{{ Form::model($enfermedad, $form_data, array('role' => 'form')) }}

  @include ('user/errors', array('errors' => $errors))

  <div class="row">
   <div class="form-group col-md-4">
      {{ Form::label('enfermedad', 'nombre enfermedad') }}
      {{ Form::text('nombre', null, array('placeholder' => 'Introduce enfermedad', 'class' => 'form-control')) }}
    </div>
</div>
  {{ Form::button('Crear ', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop