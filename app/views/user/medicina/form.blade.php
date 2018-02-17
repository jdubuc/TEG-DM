@extends ('user/layout')

<?php

    if ($medicina->exists):
        $form_data = array('route' => array('user.medicina.update', $medicina->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'user.medicina.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@if ($action == 'Editar')  
{{ Form::model($medicina, array('route' => array('user.medicina.destroy', $medicina->id), 'method' => 'DELETE', 'role' => 'form')) }}
  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::submit('Eliminar medicina', array('class' => 'btn btn-danger')) }}
    </div>
  </div>
{{ Form::close() }}
@endif

@section ('title') {{ $action }} medicina @stop

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

<h1>{{ $action }} medicina</h1>

{{ Form::model($medicina, $form_data, array('role' => 'form')) }}

  @include ('user/errors', array('errors' => $errors))

  <div class="row">
   <div class="form-group col-md-4">
      {{ Form::label('medicina', 'nombre medicina') }}
      {{ Form::text('nombre', null, array('placeholder' => 'Introduce la medicina', 'class' => 'form-control')) }}
    </div>
     <div class="form-group col-md-4">
      <label for="sel1">Selecciona el tipo:</label>
      <select name="tipo" class="form-control" id="sel1">
        <option value="Tabletas o Pastillas">Tabletas o Pastillas</option>
        <option value="capsulas">capsulas</option>
        <option value="ampolla">ampolla</option>
        <option value="grageas">Grageas</option>
        <option value="supositorio">Supositorio</option>
        <option value="ovulos">ovulos</option>
        <option value="suspension">Suspensión</option>
        <option value="gotas">Gotas</option>
        <option value="pastillas vaginales">Pastillas Vaginales</option>
        <option value="locion">Loción</option>
        <option value="crema">Crema</option>
        <option value="solucion oral">Solución oral</option>
        <option value="jarabe">Jarabe</option>
        <option value="gel">Gel</option>
        <option value="unguento">Unguento</option>
        <option value="spray">Spray</option>
        <option value="inhalador">inhalador</option>
        <option value="Aerosol">Aerosol</option>
        <option value="polvo">Polvo</option>
        
      </select>
    </div>
     <div class="form-group col-md-4">
      {{ Form::label('cantidad', 'cantidad medicina') }}
      {{ Form::text('cantidad', null, array('placeholder' => 'Introduce cantidad', 'class' => 'form-control')) }}
    </div>
     <div class="form-group col-md-4">
      {{ Form::label('compuesto', 'compuesto medicina') }}
      {{ Form::text('compuesto', null, array('placeholder' => 'Introduce compuesto', 'class' => 'form-control')) }}
    </div>
</div>
  {{ Form::button('Crear medicina', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop