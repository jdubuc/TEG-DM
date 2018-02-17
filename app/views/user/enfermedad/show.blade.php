@extends ('user/layout')

@section ('title') Especialidad: {{ $enfermedad->nombre }} @stop

@section ('content')

<h2>Se agrego Satisfactoriamente</h2>

<p>Nombre: {{ $enfermedad->nombre }}</p>


<p>
  <a href="{{ route('user.enfermedad.edit', $enfermedad->id) }}" class="btn btn-primary">
    Editar
  </a>    
</p>

{{ Form::model($enfermedad, array('route' => array('user.enfermedad.destroy', $enfermedad->id), 'method' => 'DELETE'), array('role' => 'form')) }}
  {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}
<br>
<a href="{{ url('/') }}" class="btn btn-primary">
    volver
  </a> 
@stop