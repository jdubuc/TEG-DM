@extends ('admin/layout2')

@section ('title') Lista de doctores en especialidades @stop

@section ('content')

 
  <header class="codrops-header">
    <h1><span>Lista de medicos en la especialidad </span> Seleccione un medico</h1>   
  </header>
  <div class="col-sm-3" id= "regresar" >
    <a class="btn btn-success" href="{{ route('admin.especialidades.index') }}"> Regresar</a>
  </div>
  <!-- Example row of columns -->
  <div class="container">
    <div class="row">
      <nav id="menu" class="menu">
      @foreach ($userespecialidads as $userespecialidads)
        <?php
        $user = User::find($userespecialidads->User);
        ?>
        <div class="col-md-4">
          <section class="color-8">
            <ul>
              <li>
              <a id="doc" class="col-md-4" href="{{ route('admin.users.show', $userespecialidads->User) }}" role="button">{{ $user->nombre }} {{ $user->apellido }} </a>
              </li>
            </ul>
          </section>       
        </div>
      @endforeach 
      </nav>
    </div>
  </div>

@stop