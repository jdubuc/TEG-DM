@extends ('admin/layout')

@section ('title') cita {{ $cita->full_name }} @stop

@section ('content')

<h2>cita #{{ $cita->id }}</h2>

<p>name: {{ $cita->nombre_paciente }}</p>
<p>Cedula: {{ $cita->cedula_paciente }}</p>
<p>Numero expediente: {{ $cita->numero_expediente_paciente }}</p>
<p>Hora de la cita: {{ $cita->hora }}</p>
<p>Fecha de la cita: {{ $cita->fecha_cita }}</p>
<p>Razon de la cita: {{ $cita->razon_cita }}</p>
<p>
  <a href="{{ route('admin.citas.edit', $cita->id) }}" class="btn btn-primary">
    Editar
  </a>    
</p>

{{ Form::model($cita, array('route' => array('admin.citas.destroy', $cita->id), 'method' => 'DELETE'), array('role' => 'form')) }}
  {{ Form::submit('Eliminar usuario', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}

@stop