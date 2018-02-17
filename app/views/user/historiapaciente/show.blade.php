@extends ('user/layout')

@section ('title') cita {{ $cita->full_name }} @stop

@section ('content')

	<?php
		$pacientecita = paciente::find($cita->paciente);
	?>


<blockquote class="bluejeans">
  <h1><span class="Cbluejeans">Información de cita #{{ $cita->id }}</span> </h1>  
  <p>Nombre Apellido:{{ $pacientecita->nombre }} {{ $pacientecita->apellido }}</p>

<p>Cedula:{{ $pacientecita->cedula }} </p>

</blockquote>

<blockquote class="bluejeans">
 <p>Numero expediente: {{ $cita->numero_expediente_paciente }}</p>
<p>Hora de la cita: {{ $cita->hora }}</p>
<p>Fecha de la cita: {{ $cita->fecha_cita }}</p>
</blockquote>

<blockquote class="bluejeans">
	<div style="height: 100px; line-height:20px; word-wrap: break-word;">Razon de la cita: {{ $cita->razon_cita }}</div>



</blockquote>
	


<p>
  <a href="{{ route('user.citas.edit', $cita->id) }}" class="btn btn-primary">
    Editar
  </a>    
  <a href="{{ url('/') }}" class="btn btn-primary">
    Volver
  </a> 
</p>



@stop