@extends ('admin/layout2')
 	
@section ('content')
 <div id="window">
  <canvas  id="canvas"></canvas>
 </div>
<div class=""></div>

  <div class="bg2"></div>

    <div class="profile">

      <div class="effect"></div>

        <div class="prof_pic"><img src="<?php echo asset('assets/images/' . $user->foto); ?>"></div>

          <div class="social">
            <a href="#" class="twitter"></a>
            <!-- <a href="#" class="in"></a>-->
            <!--<a href="#" class="dr"></a>-->
          </div>

          <div class="name">
            <p class="person">Dr. {{ $user->nombre }} {{ $user->apellido }}</p>
	            <?php
	       			$userespecialidad= Userespecialidads::where('User', '=', $user->id)->take(20)->get();
	        	?>
        	 @foreach ($userespecialidad as $userespecialidad)
	        	<?php
	        		$especialidades = Especialidad::find($userespecialidad->Especialidad);
	        	?>
           		<p class="vs">{{$especialidades->nombre}}</p>
             @endforeach
            <a href="#">Hacer Pre-cita</a>
          </div>

        <article id="datos">
	        <header>
	            <h1>Horario:</h1>
	        </header>
	        <article id="horario">
	            <p>{{ $user->horario }}</p>	                  
	        </article>
	            <br>
	        <header>
	            <h1>Teléfono Consultorio: </h1>
	        </header>
	        <article id="telefono">
	            <p>{{ $user->telefono1 }}</p>
	            <p>{{ $user->telefono2 }}</p>
	        </article>
	           
	        <header>
	            <h1>Información</h1>
	        </header>
	        <div id="informacion" >
	           {{ $user->informacion }}
		      
	        </div>
	           
	        <header>
	            <h1>Consultorio:</h1>
	        </header>
	        <article id="Consultorio">
	            <p>{{ $user->direccion }}</p>
	        </article>
	        <div class="name" id= "Imprimir" >
	            <a href="#">Imprimir</a>
	        </div>
        </article>
    </div>
 		<div class="name" id= "regresar" >
            <a href="{{ route('admin.especialidades.index') }}"> Regresar</a>
        </div>
@stop