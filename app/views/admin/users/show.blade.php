@extends ('admin/layoutperfilmed')
 	
@section ('content')
 
<div class="container">
  <div class="row">
    <nav id="menu" class="menu">
		<div class="col-md-4">
         	<section class="color-8">
            	<ul>
             		<li>
        				<div id="prof_pic"><img id="prof_pic" src="<?php echo asset('assets/images/' . $user->foto); ?>"></div>
          			</li>
           			<li>
          				<div class="name">
				            <h1><p class="person">Dr. {{ $user->nombre }} {{ $user->apellido }}</p></h1>
				            <h1>Especialidades:</h1>
					            <?php
					       			$userespecialidad= Userespecialidads::where('User', '=', $user->id)->take(20)->get();
					        	?>
				        	 @foreach ($userespecialidad as $userespecialidad)
					        	<?php
					        		$especialidades = Especialidad::find($userespecialidad->Especialidad);
					        	?>
				           		<h1><p class="vs">-{{$especialidades->nombre}}</p></h1><br>
				             @endforeach
				            <div class="col-sm-2" id= "regresar" >
				            	<!-- <a class="btn btn-success" href="#">Hacer Pre-cita</a> -->
				            </div>
          				</div>
					</li>
            	</ul>
          	</section>       
        </div>
        <div class="row">
        <ul>
            <li>
		        <article id="datos">
			        <header>
			            <h1>Horario:</h1>
			        </header>
			        
			            <p>{{ $user->horario }}</p>	                  
			        
			            <br>
			        <header>
			            <h1>Teléfono Consultorio: </h1>
			        </header>
			        
			            <p>{{ $user->telefono1 }}</p>
			            <p>{{ $user->telefono2 }}</p>
			         
			        <header>
			            <h1>Información:</h1>
			        </header>
			           {{ $user->informacion }} 
			        <header>
			            <h1>Consultorio:</h1>
			        </header>
			            <p>{{ $user->direccion }}</p>
			            <div class="col-sm-2" id= "regresar" >
			            	<a class="btn btn-success" href="#">Imprimir</a>
			            </div>
		        </article>
   			</li>
        </ul>
        </div>
 		<div class="col-sm-3" id= "regresar" >
            <a class="btn btn-success" href="{{ route('admin.especialidades.index') }}"> Regresar</a>
        </div>
    </nav>
 </div>
</div>
@stop