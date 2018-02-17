@extends ('user/layout')

<?php

    if ($sintomasysignos->exists):
        $form_data = array('route' => array('user.sintomasysignos.update', $sintomasysignos->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'user.sintomasysignos.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@if ($action == 'Editar')  
{{ Form::model($sintomasysignos, array('route' => array('user.sintomasysignos.destroy', $sintomasysignos->id), 'method' => 'DELETE', 'role' => 'form')) }}
  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::submit('Eliminar sintomasysignos', array('class' => 'btn btn-danger')) }}
    </div>
  </div>
{{ Form::close() }}
@endif

@section ('title') {{ $action }} sintomasysignos @stop

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

<h1>{{ $action }} sintomasysignos</h1>

{{ Form::model($sintomasysignos, $form_data, array('role' => 'form')) }}

  @include ('user/errors', array('errors' => $errors))

  <div class="row">
   <div class="form-group col-md-4">
      {{ Form::label('sintomasysignos', 'nombre sintomas ó signos') }}
      {{ Form::text('nombre', null, array('placeholder' => 'Introduce sintomas ó signos', 'class' => 'form-control')) }}
    </div>
</div>
  {{ Form::button('Crear ', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop