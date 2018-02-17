@extends ('user/layout')

@section ('title') cita {{ $cita->full_name }} @stop

@section ('content')

	<?php
		$pacientecita = paciente::find($cita->paciente);
	?>


<h1><span class="Cbluejeans">Información de cita </span> </h1> 
	<table class="table table-striped"style=" word-wrap: break-word;color:black;">
        <tr>
          <th >Nombre Apellido:</th>
          <th>Cedula:</th>
          <th width="32%" >Numero expediente:</th>
          <th width="30%">Hora de la cita:</th> 
          <th width="70%">Fecha de la cita:</th>              
        </tr>
        <tr>
        <td><p>{{ $pacientecita->nombre }} {{ $pacientecita->apellido }} </p></td>
        <td><p>{{ $pacientecita->cedula }}</p></td>
        <td><p>{{ $cita->numero_expediente_paciente }}</p></td>
        <td><p>{{ $cita->hora }} </p></td>
        <td><p>{{ $cita->fecha_cita }}</p></td>
        </tr>
      </table>
      <h1><span class="Cbluejeans">Razon de la cita: </span> </h1>  
	<blockquote class="bluejeans">
  
  <p style="word-wrap: break-word;">{{ $cita->razon_cita }}</p>
</blockquote>
<?php 
  if($cita->estado==2)
    {
      
      $historiapaciente =historiapaciente::where('citas', 'LIKE', '%' .  $cita->id . '%')->first();

?>
      <h1><span class="Cbluejeans">Información de cita </span> </h1>  
      <blockquote class="bluejeans">
  
  <p>sintomas:{{ $historiapaciente->sintomas_signos }}</p>
</blockquote>

<blockquote class="bluejeans">
  <p>diagnostico {{ $historiapaciente->diagnostico }}</p>
 </blockquote>

<blockquote class="bluejeans">
  <p>tratamiento:{{ $historiapaciente->tratamiento }}</p>
</blockquote>

<blockquote class="bluejeans">
  <p>medicamentos:{{ $historiapaciente->medicamentos }}</p>
</blockquote>
<blockquote class="bluejeans">
  <p>Observaciones:{{ $historiapaciente->observaciones }}</p>
</blockquote>

  <?php   
  }
  else
  {
  ?>
    <p>
      <a href="{{ route('user.citas.edit', $cita->id) }}" class="btn btn-primary">
        Editar
      </a>
    </p>
  <?php 
  }
  ?>


<p id="botones" style="padding:0px 0px 100px 0px;">  
  <a href="{{ url('/') }}" class="btn btn-primary">
    Volver
  </a> 
  <a href="{{ route('user.citapaciente.show', $pacientecita->id) }}" class="btn btn-primary">
    Historial Médico
  </a>
  <a class="btn btn-info" alt="Click para Imprimir esta página" title="Click para Imprimir esta página" 
href=javascript:window.print();>Imprimir esta página</a>
</p>



@stop