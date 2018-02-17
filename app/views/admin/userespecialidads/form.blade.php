@extends ('admin/layout')

<?php

    if ($userespecialidads->exists):
        $form_data = array('route' => array('admin.userespecialidad.update', $userespecialidads->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'admin.userespecialidad.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@if ($action == 'Editar')  
{{ Form::model($userespecialidads, array('route' => array('admin.userespecialidads.destroy', $userespecialidads->id), 'method' => 'DELETE', 'role' => 'form')) }}
  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::submit('Eliminar relacion user especialidad', array('class' => 'btn btn-danger')) }}
    </div>
  </div>
{{ Form::close() }}
@endif

@section ('title') {{ $action }} User Especialidades @stop

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

<h1>{{ $action }} relacion user Especialidades</h1>

{{ Form::open(array('route' => 'admin.userespecialidads.store', 'method' => 'POST'), array('role' => 'form')) }}

  @include ('admin/errors', array('errors' => $errors))
 <div class="row">
   <div class="form-group col-md-4">
          <?php
              $users = User::orderBy('nombre')->get();
          ?>
          <select name="User" >
            @foreach ($users as $users)
                <option value="{{$users->id}}">Dr {{$users->nombre}} {{$users->apellido}}</option>  
            @endforeach
          </select>   

          
          <?php
            $especialidades = Especialidad::orderBy('nombre')->get();
          ?>
          <select name="Especialidad" >
            @foreach ($especialidades as $especialidades)
                <option value="{{$especialidades->id}}">{{$especialidades->nombre}} </option>  
            @endforeach
          </select> 

        

    </div>
</div>
  {{ Form::button('Crear relacion user especialidad', array('type' => 'submit', 'class' => 'btn btn-primary','onclick' =>' myFunction()')) }}    
  
{{ Form::close() }}

@stop