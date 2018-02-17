@extends ('admin/layout')

@section ('title') User {{ $user->full_name }} @stop

@section ('content')

<h2>User #{{ $user->id }}</h2>

<p>Nombre de usuario: {{ $user->username }}</p>
<p>Email: {{ $user->email }}</p>
<p>nombre:{{ $user->nombre }}</p>
<p>apellido:{{ $user->apellido }}</p>
<p>telefono1:{{ $user->telefono1 }}</p>
<p>telefono2:{{ $user->telefono2 }}</p>
<p>informacion:{{ $user->informacion }}</p>
<p>horario:{{ $user->horario }}</p>
<p>direccion:{{ $user->direccion }}</p>

<p>
  <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
    Editar
  </a>    
</p>

{{ Form::model($user, array('route' => array('admin.users.destroy', $user->id), 'method' => 'DELETE'), array('role' => 'form')) }}
  {{ Form::submit('Eliminar usuario', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}

@stop