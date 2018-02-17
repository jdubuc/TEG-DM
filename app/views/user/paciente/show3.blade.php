@extends ('admin/layout')

@section ('title') paciente {{ $paciente->full_name }} @stop

@section ('content')

<h2>paciente #{{ $paciente->id }}</h2>

<p>Email: {{ $paciente->correo_electronico }}</p>
<p>nombre:{{ $paciente->nombre }}</p>
<p>apellido:{{ $paciente->apellido }}</p>
<p>telefono:{{ $paciente->telefono }}</p>
<p>cedula:{{ $paciente->cedula }}</p>
<p>procedencia:{{ $paciente->informacion }}</p>
<p>responsable:{{ $paciente->responsable }}</p>
<p>telefono responsable:{{ $paciente->telefono }}</p>
<p>alergias:{{ $paciente->alergias }}</p>
<p>numero expediente:{{ $paciente->num_registro }}</p>

<p>
  <a href="{{ route('admin.pacientes.edit', $paciente->id) }}" class="btn btn-primary">
    Editar
  </a>    
</p>

{{ Form::model($paciente, array('route' => array('admin.pacientes.destroy', $paciente->id), 'method' => 'DELETE'), array('role' => 'form')) }}
  {{ Form::submit('Eliminar usuario', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}

@stop