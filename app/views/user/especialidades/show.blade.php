@extends ('admin/layout')

@section ('title') Especialidad: {{ $especialidades->nombre }} @stop

@section ('content')

<h2>identificador #{{ $especialidades->id }}</h2>

<p>Nombre: {{ $especialidades->nombre }}</p>


<p>
  <a href="{{ route('admin.especialidades.edit', $especialidades->id) }}" class="btn btn-primary">
    Editar
  </a>    
</p>

{{ Form::model($especialidades, array('route' => array('admin.especialidades.destroy', $especialidades->id), 'method' => 'DELETE'), array('role' => 'form')) }}
  {{ Form::submit('Eliminar especialidad', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}

<a href="{{ route('admin.especialidades.create') }}" class="btn btn-primary">
    volver
  </a> 
@stop