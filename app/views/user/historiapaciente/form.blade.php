@extends ('user/layouthistoriapaciente')

<?php

    if ($historiapaciente->exists):
        $form_data = array('route' => array('user.historiapaciente.update', $historiapaciente->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'user.historiapaciente.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@if ($action == 'Editar')  
{{ Form::model($historiapaciente, array('route' => array('user.historiapaciente.destroy', $historiapaciente->id), 'method' => 'DELETE', 'role' => 'form')) }}
  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::submit('Eliminar cita', array('class' => 'btn btn-danger')) }}
    </div>
  </div>
{{ Form::close() }}
@endif

@section ('title') {{ $action }}  @stop

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

<?php  

        $request = new Request();
        $input = Input::all();
        Session::flash('backUrl', Request::fullUrl());
        $iduser=$input['id'];
        $iduser2=intval($iduser);
        $cita = Cita::find($iduser2);
       
        $pacientecita = paciente::find($cita->paciente);

        $c=$cita->id;
?>

<h5>{{ $action }} entrada a la historia del paciente {{ $pacientecita->nombre }} {{ $pacientecita->apellido }}</h5>

<a href="{{ route('user.citapaciente.show', $pacientecita->id) }}" class="btn btn-primary">Historial Médico del paciente</a>

<a href="{{ route('user.sintomasysignos.create') }}" class="btn btn-primary">Agregar Sintomas y signos</a>

<a href="{{ route('user.medicina.create') }}" class="btn btn-primary">Agregar medicamento</a>

<a href="{{ route('user.enfermedad.create') }}" class="btn btn-primary">Agregar enfermedad</a>


<br>



{{ Form::model($historiapaciente, $form_data, array('role' => 'form')) }}

  @include ('user/errors', array('errors' => $errors))

<div class="row">    
<?php      
  $historiapaciente->citas=$c;
  $historiapaciente->paciente=$pacientecita->id;
  //echo "$historiapaciente->citas";
  //echo "$historiapaciente->paciente";
  //dd($historiapaciente->citas);
  //$cita->estado='3';
  $p=$pacientecita->id;
?>
   
</div>

  <div class="row">
      <?php
        $sintomasysignos= Sintomasysignos::orderBy('nombre')->get();
      ?>
  <div class=" col s6 ">
    <select multiple="multiple" name="sintomas_signos[]">
      <option value="" disabled selected>Click para seleccionar los sintomas y signos</option>
        @foreach ($sintomasysignos as $sintomasysignos)
          <option value="{{ $sintomasysignos->nombre }} ">{{ $sintomasysignos->nombre }}</option>
        @endforeach
     </select>

  </div>
  </div>
  <div class="row">
      <?php
        $medicina= Medicina::orderBy('nombre')->get();
      ?>
  <div class=" col s6 ">
    <select multiple="multiple" name="medicamentos[]">
      <option value="" disabled selected>Click para seleccionar los medicamentos</option>
        @foreach ($medicina as $medicina)
          <option value="{{ $medicina->nombre }}/{{ $medicina->tipo }}/{{ $medicina->compuesto }}/{{ $medicina->cantidad }} ">{{ $medicina->nombre }} /{{ $medicina->tipo }} /{{ $medicina->compuesto }}/ {{ $medicina->cantidad }}</option>
        @endforeach
     </select>

  </div>
 </div>
  <div class="row">
      <?php
        $enfermedad= enfermedad::orderBy('nombre')->get();
      ?>
  <div class=" col s6 ">
    <select multiple="multiple" name="diagnostico[]">
      <option value="" disabled selected>Click para seleccionar las enfermedades para dar diagnostico</option>
        @foreach ($enfermedad as $enfermedad)
          <option value="{{ $enfermedad->nombre }} ">{{ $enfermedad->nombre }}</option>
        @endforeach
     </select>

  </div>
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('observaciones', 'observaciones') }}
      {{ Form::textarea('observaciones', null, array('placeholder' => 'Introduce observaciones', 'class' => 'form-control','rows' =>'4' ,'cols' =>'50')) }}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('tratamiento', 'tratamiento') }}
        {{ Form::textarea('tratamiento', null, array('placeholder' => 'Introduce tratamiento', 'class' => 'form-control','rows' =>'4' ,'cols' =>'50')) }}
      </div>
  </div>

 {{ Form::hidden('citas', $c, array('readonly' )) }}
 {{ Form::hidden('paciente', $p, array('readonly' )) }}
  {{ Form::button('Terminar cita', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}


@stop
