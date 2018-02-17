@extends ('user/layout')

@section ('title') Especialidad: {{ $sintomasysignos->nombre }} @stop

@section ('content')

<h2>Se agrego Satisfactoriamente</h2>

<p>Nombre: {{ $sintomasysignos->nombre }}</p>


<p>
  <a href="{{ route('user.sintomasysignos.edit', $sintomasysignos->id) }}" class="btn btn-primary">
    Editar
  </a>    
</p>

{{ Form::model($sintomasysignos, array('route' => array('user.sintomasysignos.destroy', $sintomasysignos->id), 'method' => 'DELETE'), array('role' => 'form')) }}
  {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}
<br>
<a href="{{ url('/') }}" class="btn btn-primary">
    volver
  </a> 
@stop