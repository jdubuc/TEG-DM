@extends ('user/layout')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php

    if ($citas->exists):
        $form_data = array('route' => array('user.citas.update', $citas->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'user.citas.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@if ($action == 'Editar')  


<!--{{ Form::model($citas, array('route' => array('user.citas.destroy', $citas->id), 'method' => 'DELETE', 'role' => 'form')) }}
  
  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::submit('Eliminar cita', array('class' => 'btn btn-danger')) }}
    </div>
  </div>
{{ Form::close() }}-->
@endif

@section ('title') {{ $action }} @stop

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


<a href="{{ route('user.paciente.create') }}" class="btn btn-primary">Agrear un nuevo paciente</a>
<h1>{{ $action }} Cita</h1>

{{ Form::model($citas, $form_data, array('role' => 'form','autocomplete'=>'on')) }}

  @include ('user/errors', array('errors' => $errors))

  <div class="row">
    <div class="form-group col-md-4">

      <?php
  $id = Auth::user()->id;
  $currentuser = Auth::user();
  $citas->User = $id;
  $citas->estado=1;
  ?>

  <span name="User" >Se creara una cita para el Dr. {{ $currentuser->nombre }} {{ $currentuser->apellido }}.</span><br>        
    <?php
      $paciente = paciente::orderBy('nombre')->get();
    ?>

    
  <div id="project-label">Busca el paciente:(comienza tipeando su nombre y se acutocompletara)</div>

<input id="project">
<input name="paciente" type="hidden" id="project-id">
<p id="project-description"></p>

     
    </div>   
  </div>

  <div class="row">
     
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
        <input type="text" id="timepicker" name="hora" class="form-control timepicker">
      </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('fecha_cita', 'Fecha Cita') }}
        {{ Form::input('date','fecha_cita', null, array('placeholder' => 'DD:MM:AA', 'class' => 'form-control')) }}
      </div>
  </div>
 {{ Form::hidden('estado', $citas->estado, array('readonly' )) }}
 {{ Form::hidden('User', $citas->User, array('readonly' )) }}
 {{ Form::button('aceptar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

<script type="text/javascript">
  $('.timepicker').wickedpicker({now: '8:30', twentyFour: false, title:'Elige la hora', showSeconds: false});
        //    $('.timepicker-24').wickedpicker({twentyFour: true});     
</script>

@stop