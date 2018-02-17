@extends ('user/layout')

@section ('title') paciente {{ $paciente->full_name }} @stop

@section ('content')

<h2>Paciente {{ $paciente->nombre }} {{ $paciente->apellido }}</h2>
<h2>Cedula:{{ $paciente->cedula }}</h2>
<div class="row" style="color:black">
    <div class="form-group col-md-4">
      <span >Email: </span><p> {{ $paciente->correo_electronico }}</p>
      <span >Nombre: </span><p>{{ $paciente->nombre }}</p>
		<span >Apellido: </span><p>{{ $paciente->apellido }}</p>
		<span >Telefono: </span><p>{{ $paciente->telefono }}</p>
		<span >Cedula: </span><p>{{ $paciente->cedula }}</p>
  	</div>
    <div class="form-group col-md-4">
      <span >Procedencia: </span><p>{{ $paciente->procedencia }}</p>
<span >Responsable: </span><p>{{ $paciente->responsable }}</p>
<span >Telefono responsable: </span><p>{{ $paciente->telefono }}</p>
<span >Alergias: </span><p>{{ $paciente->alergias }}</p>
<span >Numero expediente: </span><p>{{ $paciente->num_registro }}</p>
</div>
  </div>



<p>
  <a href="{{ route('user.paciente.edit', $paciente->id) }}" class="btn btn-primary">Editar</a>    
  <a href="{{ route('user.citapaciente.show', $paciente->id) }}" class="btn btn-primary">Historial Médico</a>
</p>


 


@stop