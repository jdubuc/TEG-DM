@extends ('admin/layout')

@section ('title') Lista de citas @stop




@section ('content')

  <h1>Lista de citas</h1>
  <p>
    <a href="{{ route('admin.citas.create') }}" class="btn btn-primary">Crear una nueva cita</a>
  </p>
  <table class="table table-striped"style="width: 100%">
    <tr>
        <th>Nombre</th>
        <th>Cedula</th>
        <th>Hora</th>
        <th>Fecha</th>
        
    </tr>
    @foreach ($cita as $cita)
    <tr>
        <td>{{ $cita->nombre_paciente }} {{ $cita->apellido_paciente }}</td>
        <td>{{ $cita->cedula_paciente }} </td>
        <td>{{ $cita->hora }} </td>
        <td>{{ $cita->fecha_cita }} </td>
    <td>
          <a href="{{ route('admin.citas.show', $cita->id) }}" class="btn btn-info">
              Ver
          </a>
          <a href="{{ route('admin.citas.edit', $cita->id) }}" class="btn btn-primary">
            Editar
          </a>
          <a href="#" data-id="{{ $cita->id }}" class="btn btn-danger btn-delete">
              Eliminar
          </a>
        </td>
    </tr>
    @endforeach
  </table>

{{ Form::open(array('route' => array('admin.citas.destroy', 'ESPECIALIDAD_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}

@stop