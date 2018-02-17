@extends ('admin/layout2')

@section ('title') Lista de doctores en especialidades @stop

@section ('content')

  <h1>Lista de doctores en la especialidad</h1>
   <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        @foreach ($userespecialidads as $userespecialidads)
        <?php
        
        $user = User::find($userespecialidads->User);
        ?>

        <div class="col-md-4">
          <section class="color-8">
            <p class="perspective">
          <a id="doc" class="btn2  btn2-8 btn2-8f" href="{{ route('admin.users.show', $userespecialidads->User) }}" role="button">{{ $user->nombre }} {{ $user->apellido }} </a>
           </p> 
          </section>       
       </div>
       @endforeach
       
    </div>

@stop