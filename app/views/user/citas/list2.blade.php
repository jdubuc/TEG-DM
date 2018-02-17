@extends ('admin/layout2')

@section ('title') Lista de Especialidades @stop

@section ('content')

  <h1>Lista de especialidades</h1>
  <h1>Seleccione una Especialidad</h1>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        @foreach ($especialidades as $especialidad)
        <div class="col-md-4">
          <p><a class="btn btn-primary btn-lg push_button" href="{{ route('admin.userespecialidads.show', $especialidad->id) }}" role="button">{{ $especialidad->nombre }} </a></p>
        </div>
       @endforeach
    </div>
@stop