@extends ('admin/layout')

@section ('title') Lista de historia pacientes @stop




@section ('content')

  <h1>Lista de citas</h1>
  <p>
    <a href="{{ route('user.citas.create') }}" class="btn btn-primary">Crear una nueva historia paciente</a>
  </p>
  <table class="table table-striped"style="width: 100%">
    <tr>
        <th>sintomas_signos</th>
        <th>diagnostico</th>
        <th>tratamiento</th>
        <th>Fecha</th>
        
    </tr>
    @foreach ($historiapaciente as $historiapaciente)
    <li class="event">
    <span class="date">2012</span>
    <h5>Event title</h5>
    <p>description: <br> missions, accomplishments, etc</p>
  </li>
          <a href="{{ route('user.historiapacientes.show', $historiapaciente->id) }}" class="btn btn-info">
              Ver
          </a>
          <a href="{{ route('user.historiapacientes.edit', $historiapaciente->id) }}" class="btn btn-primary">
            Editar
          </a>
          <a href="#" data-id="{{ $historiapaciente->id }}" class="btn btn-danger btn-delete">
              Eliminar
          </a>
        </td>
    </tr>
    @endforeach
  </table>

{{ Form::open(array('route' => array('admin.historiapacientes.destroy', 'ESPECIALIDAD_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) }}
{{ Form::close() }}

@stop