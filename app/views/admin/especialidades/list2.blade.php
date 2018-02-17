@extends ('admin/layout2')

@section ('title') Lista de Especialidades @stop

@section ('content')

<header class="codrops-header">
          <h1><span>Lista de especialidades</span> Seleccione una Especialidad</h1>
         
        </header>

    <!-- <div class="container">
      
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
    </div>-->
<div class="container">
  <div class="row">
    <nav id="menu" class="menu">
        
            @foreach ($especialidades as $especialidad)
            <div class=".col-md-4">
          <ul>
              <li> <a class=".col-md-4" href="{{ route('admin.userespecialidads.show', $especialidad->id) }}" role="button">{{ $especialidad->nombre }} </a></li>                      
             </ul>
        </div>  
            @endforeach
         
    </nav>
  </div>
</div>
@stop