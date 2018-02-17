@extends ('admin/layout')

@section ('title') Lista de especialidades @stop

<p>
    <a href="{{ route('admin.especialidades.create') }}" class="btn btn-primary">Crear una nueva especialidad</a>
  </p>


@section ('content')

  <h1>Lista de especialidades</h1>
  
  <table class="table table-striped"style="width: 100%">
    <tr>
        <th>nombre de la especialidad</th>
    </tr>
    @foreach ($especialidades as $especialidad)
    <tr>
        <td>{{ $especialidad->nombre }}</td>
       
        <td>
          <a href="{{ route('admin.especialidades.show', $especialidad->id) }}" class="btn btn-info">
              Ver
          </a>
          <a href="{{ route('admin.especialidades.edit', $especialidad->id) }}" class="btn btn-primary">
            Editar
          </a>
          <a href="#" data-id="{{ $especialidad->id }}" class="btn btn-danger btn-delete">
              Eliminar
          </a>
        </td>
    </tr>
    @endforeach
  </table>

{{ Form::open(array('route' => array('admin.especialidades.destroy', 'ESPECIALIDAD_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}

@stop