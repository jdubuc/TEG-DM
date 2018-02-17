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
          <section class="color-8">
          <p class="perspective">
          <a class="btn2  btn2-8 btn2-8f" href="{{ route('admin.userespecialidads.show', $especialidad->id) }}" role="button">{{ $especialidad->nombre }} </a>
          </p> 
          </section>       
        </div>
        @endforeach
      </div>
    </div>
@stop