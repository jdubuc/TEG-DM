@extends ('user/layout')

@section ('title') Especialidad: {{ $medicina->nombre }} @stop

@section ('content')

<p>Nombre: {{ $medicina->nombre }}</p>
<p>tipo: {{ $medicina->tipo }}</p>
<p>compuesto: {{ $medicina->compuesto }}</p>
<p>cantidad: {{ $medicina->cantidad }}</p>
<p>
  <a href="{{ route('user.medicina.edit', $medicina->id) }}" class="btn btn-primary">
    Editar
  </a>    
</p>
{{ Form::model($medicina, array('route' => array('user.medicina.destroy', $medicina->id), 'method' => 'DELETE'), array('role' => 'form')) }}
  {{ Form::submit('Eliminar especialidad', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}
<a href="{{ route('user.medicina.create') }}" class="btn btn-primary">volver</a> 
@stop