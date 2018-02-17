<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Zitat Bienvenido</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<!--<meta http-equiv="refresh" content="60">-->
		
		<link rel="shortcut icon" href="<?php echo asset('assets/images/favicon.ico'); ?>">
		{{ HTML::style('assets/css/demou.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/componentu.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/defaultmu.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/componentmu.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		{{ HTML::script('assets/js/modernizr.custom.js') }}
	</head>
<body>
	<?php
	$id = Auth::user()->id;
	$currentuser = User::find($id);
	$user= Auth::user();
	?>
   <div class="container">
			<header class="clearfix">
				<img src="<?php echo asset('assets/images/zitat.png'); ?>">
				<span>Bienvenido Dr. {{ $user->nombre }} {{ $user->apellido }}.</span>
				<!--<span>Propocket <span class="bp-icon bp-icon-about" data-content="Bienvenido."></span></span>
				<h1>ZITAT</h1>-->
				<!--<nav>
					<a href="http://tympanus.net/Blueprints/SplitLayout/" class="bp-icon bp-icon-prev" data-info="previous Blueprint"><span>Previous Blueprint</span></a>
					<a href="http://tympanus.net/Blueprints/GridGallery/" class="bp-icon bp-icon-next" data-info="next Blueprint"><span>Next Blueprint</span></a>
					<a href="http://tympanus.net/codrops/?p=18521" class="bp-icon bp-icon-drop" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
					<a href="http://tympanus.net/codrops/category/blueprints/" class="bp-icon bp-icon-archive" data-info="Blueprints archive"><span>Go to the archive</span></a>
				</nav>-->
			</header>	
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="icon-shop"><span>Citas</span></a></li>
						<li><a href="#section-2" class="icon-cup "><span>En espera</span></a></li>
						<li><a href="#section-3" class="icon-food"><span>Realizada</span></a></li>
						<li><a href="#section-4" class="icon2-trash-can2"><span>Cancelada</span></a></li>
						<li><a href="#section-5" class="icon-lab"><span>Datos De Medico</span></a></li>
						<li><a href="#section-6" class="icon-truck"><span>Especialidades</span></a></li>
					</ul>
				</nav>
				<div class="content">
					<section id="section-1">
								<?php
								 $cita= Cita::where('User', '=', $id)->orderBy('fecha_cita')->get();
								 $date = date('m/d/Y h:i:s a', time());
										//echo $date;
										date_default_timezone_set("America/New_York");
										echo "La hora es: " . date("d/m/Y h:i a");
								?>
									<h1>Lista de citas de hoy</h1>
									  <p>
									  	<!--<a href="{{ route('user.citas.create') }}">Crear una nueva cita</a><br>-->
									   <!-- <a href="{{ route('user.citas.create') }}" class="btn btn-primary">Crear una nueva cita</a>-->
									  </p>
									  <table class="table table-striped"style="width: 100%">
									    <tr>
									        <th>Nombre</th>
									        <th>Cedula</th>
									        <th>Hora</th>
									        <th>Fecha</th>
									        <th>Estado</th>
									        <th><a href="{{ route('user.calendario.show', $id) }}" class="btn btn-primary">Calendario</a><a href="{{ route('user.citas.create') }}" class="btn btn-primary">Crear una nueva cita</a></th>
									    </tr>
									    @foreach ($cita as $cita)
									    <?php
										$pacientecita = paciente::find($cita->paciente);
										$dia=date("d");
										$mes=date("m");
										$ano=date("Y");
										$fechacita=explode("-", $cita->fecha_cita);
            							if($fechacita['0']==$ano and $fechacita['1']==$mes and $fechacita['2']==$dia)
								 		{	
								 		$dateq=date_create_from_format("g : i A",$cita->hora);
										//echo $dateq->format('g : i A');
										$result = $dateq->format('Y-m-d H:i:s');
										$dateqq = new DateTime();
										$result = $dateq->format('Y-m-d H:i:s');
										//var_dump($dateqq > $dateq);
										if($cita->estado != '2')
								 		{
										if($dateqq > $dateq)
								 		{
								 			$cita->estado='3';
								 			$cita->save();
								 		}
								 		}	
										?>
									    <tr>
									        <td>{{ $pacientecita->nombre }} {{ $pacientecita->apellido }}</td>
									        <td>{{ $pacientecita->cedula }} </td>
									        <td>{{ $cita->hora }} </td>
									        <td>{{ $fechacita['2'] }}-{{ $fechacita['1'] }}-{{ $fechacita['0'] }} </td>
									<!-- estado de la cita-->
										<?php
								 			if($cita->estado!=1)
								 				{
								 					if($cita->estado==2)
								 						{
								 		?>
								 						<td><img id="estado" title="Cita Realizada" src="<?php echo asset('assets/images/e2.png'); ?>" height="25 px" width="25 px"></td>
								 						<!-- estado de la cita-->
									    	<td>
										        <a href="{{ route('user.citas.show', $cita->id) }}" class="btn btn-info">
										            Ver
										        </a>
										     
										        <a href="{{ route('user.citapaciente.show', $pacientecita->id) }}" class="btn btn-primary">
										            Historial Médico
										        </a>
									        </td>
								 		<?php
								 		                }
								 					if($cita->estado==3)
								 						{
								 		?>
								 						<td><img id="estado" title="Cita cancelada" src="<?php echo asset('assets/images/e3.png'); ?>" height="25 px" width="25 px"></td>
								 		<?php           }
								 				}
								 			else
								 				{
										?>
									    		<td><img id="estado" title="Cita en espera" src="<?php echo asset('assets/images/e1.png'); ?>" height="25 px" width="25 px"></td>
									    		<!-- estado de la cita-->
									    	<td>
										    	<a href="{{ route('user.historiapaciente.create', ['id'=>$cita->id]) }}" class="btn btn-primary">
										            Efectuar Cita
										        </a>
										         <a href="{{ route('user.citapaciente.show', $pacientecita->id) }}" class="btn btn-primary">
										            Historial Médico
										        </a>
										        <a href="{{ route('user.citas.show', $cita->id) }}" class="btn btn-info">
										            Ver
										        </a>
										        <a href="{{ route('user.citas.edit', $cita->id) }}" class="btn btn-primary">
										            Editar
										        </a>
										            {{Form::model($user, array('route' => array('user.citas.destroy', $cita->id), 'method' => 'DELETE', 'role' => 'form','style'=>'width: 108px; position:relative; margin-top:5px;')) }}
													 <a >
													        {{ Form::submit('Eliminar cita', array('class' => 'btn btn-danger ')) }}
													    </a>
													  {{ Form::close() }}
									        </td>
									    <?php
									    		}
										?>
									    </tr>
									    <?php
									    		}
										?>
									    @endforeach
									  </table>
					</section>
					<section id="section-2">
						<?php
								 $cita= Cita::where('User', '=', $id)->orderBy('fecha_cita')->get();

								?>
									<h1>Lista de citas</h1>
									  <p>
									  	<!--<a href="{{ route('user.citas.create') }}">Crear una nueva cita</a><br>-->
									   <!-- <a href="{{ route('user.citas.create') }}" class="btn btn-primary">Crear una nueva cita</a>-->
									  </p>
									  <table class="table table-striped"style="width: 100%">
									    <tr>
									        <th>Nombre</th>
									        <th>Cedula</th>
									        <th>Hora</th>
									        <th>Fecha</th>
									        <th>Estado</th>
									        <th><a href="{{ route('user.calendario.show', $id) }}" class="btn btn-primary">Calendario</a><a href="{{ route('user.citas.create') }}" class="btn btn-primary">Crear una nueva cita</a></th>
									    </tr>
									    @foreach ($cita as $cita)
									    <?php
									    $pacientecita = paciente::find($cita->paciente);
										$dia=date("d");
										$mes=date("m");
										$ano=date("Y");
										$horacita=explode("-", $cita->fecha_cita);
										//echo $horacita['0'].$horacita['1'].$horacita['2'] ;
            							if($horacita['0']==$ano and $horacita['1']==$mes and $horacita['2']==$dia)
								 		{ 
								 			if($cita->estado==1)
								 				{		
								 		?>
									    <?php
								 			$pacientecita = paciente::find($cita->paciente);
											?>
									    <tr>
									        <td>{{ $pacientecita->nombre }} {{ $pacientecita->apellido }}</td>
									        <td>{{ $pacientecita->cedula }} </td>
									        <td>{{ $cita->hora }} </td>
									        <td>{{ $horacita['2'] }}-{{ $horacita['1'] }}-{{ $horacita['0'] }} </td>
									<!-- estado de la cita-->
									    		<td><img id="estado" title="Cita en espera" src="<?php echo asset('assets/images/e1.png'); ?>" height="25 px" width="25 px"></td>
									<!-- estado de la cita-->
									    	<td>
										    	<a href="{{ route('user.historiapaciente.create', ['id'=>$cita->id]) }}" class="btn btn-primary">
										            Efectuar Cita
										        </a>

										        <a href="{{ route('user.citas.show', $cita->id) }}" class="btn btn-info">
										            Ver
										        </a>
										        <a href="{{ route('user.citas.edit', $cita->id) }}" class="btn btn-primary">
										            Editar
										        </a>
										        <a href="{{ route('user.citas.destroy', $cita->id) }}" class="btn btn-danger btn-delete">
										            Cancelar
										        </a>
										        <a href="{{ route('user.citapaciente.show', $pacientecita->id) }}" class="btn btn-primary">
										            Historial Médico
										        </a>
									        </td>
									    </tr>
									     <?php
									    		}}
										?>
									    @endforeach
									  </table>
					</section>
					<section id="section-3">
									<?php
								 $cita= Cita::where('User', '=', $id)->orderBy('fecha_cita')->get();
								?>
									<h1>Lista de citas</h1>
									  <p>
									  	<!--<a href="{{ route('user.citas.create') }}">Crear una nueva cita</a><br>-->
									   <!-- <a href="{{ route('user.citas.create') }}" class="btn btn-primary">Crear una nueva cita</a>-->
									  </p>
									  <table class="table table-striped"style="width: 100%">
									    <tr>
									        <th>Nombre</th>
									        <th>Cedula</th>
									        <th>Hora</th>
									        <th>Fecha</th>
									        <th>Estado</th>
									        <th><a href="{{ route('user.calendario.show', $id) }}" class="btn btn-primary">Calendario</a><a href="{{ route('user.citas.create') }}" class="btn btn-primary">Crear una nueva cita</a></th>
									    </tr>
									    @foreach ($cita as $cita)
									    <?php
									    $pacientecita = paciente::find($cita->paciente);
										$dia=date("d");
										$mes=date("m");
										$ano=date("Y");
										$horacita=explode("-", $cita->fecha_cita);
            							if($horacita['0']==$ano and $horacita['1']==$mes and $horacita['2']==$dia)
								 		{
								 			if($cita->estado==2)
								 				{			
								 		?>
									    <?php
								 			$pacientecita = paciente::find($cita->paciente);
											?>
									    <tr>
									        <td>{{ $pacientecita->nombre }} {{ $pacientecita->apellido }}</td>
									        <td>{{ $pacientecita->cedula }} </td>
									        <td>{{ $cita->hora }} </td>
									        <td>{{ $horacita['2'] }}-{{ $horacita['1'] }}-{{ $horacita['0'] }}  </td>
									<!-- estado de la cita-->
									    		<td><img id="estado" title="Cita realizada" src="<?php echo asset('assets/images/e2.png'); ?>" height="25 px" width="25 px"></td>
									<!-- estado de la cita-->
									    	<td>
										        <a href="{{ route('user.citas.show', $cita->id) }}" class="btn btn-info">
										            Ver
										        </a>
										        <a href="{{ route('user.citapaciente.show', $pacientecita->id) }}" class="btn btn-primary">
										            Historial Médico
										        </a>
									        </td>
									    </tr>
									     <?php
									    		}}
										?>
									    @endforeach
									  </table>
					</section>
					<section id="section-3">
									<?php
								 $cita= Cita::where('User', '=', $id)->orderBy('fecha_cita')->get();
								?>
									<h1>Lista de citas</h1>
									  <p>
									  	<!--<a href="{{ route('user.citas.create') }}">Crear una nueva cita</a><br>-->
									  	
									   <!-- <a href="{{ route('user.citas.create') }}" class="btn btn-primary">Crear una nueva cita</a>-->
									  </p>
									  <table class="table table-striped"style="width: 100%">
									    <tr>
									        <th>Nombre</th>
									        <th>Cedula</th>
									        <th>Hora</th>
									        <th>Fecha</th>
									        <th>Estado</th>
									        <th><a href="{{ route('user.calendario.show', $id) }}" class="btn btn-primary">Calendario</a><a href="{{ route('user.citas.create') }}" class="btn btn-primary">Crear una nueva cita</a></th>
									    </tr>
									    @foreach ($cita as $cita)
									    <?php
									     $pacientecita = paciente::find($cita->paciente);
										$dia=date("d");
										$mes=date("m");
										$ano=date("Y");
										$horacita=explode("-", $cita->fecha_cita);
										
            							if($horacita['0']==$ano and $horacita['1']==$mes and $horacita['2']==$dia)
								 		{
								 			if($cita->estado==3)
								 				{			
								 		?>
									    <?php
								 			$pacientecita = paciente::find($cita->paciente);
											?>
									    <tr>
									        <td>{{ $pacientecita->nombre }} {{ $pacientecita->apellido }}</td>
									        <td>{{ $pacientecita->cedula }} </td>
									        <td>{{ $cita->hora }} </td>
									        <td>{{ $horacita['2'] }}-{{ $horacita['1'] }}-{{ $horacita['0'] }} </td>
									<!-- estado de la cita-->
									    		<td><img id="estado" title="Cita en cancelada" src="<?php echo asset('assets/images/e3.png'); ?>" height="25 px" width="25 px"></td>
									<!-- estado de la cita-->
									    	<td>
										        <a href="{{ route('user.citas.show', $cita->id) }}" class="btn btn-info">
										            Ver
										        </a>
										        <a href="{{ route('user.citapaciente.show', $pacientecita->id) }}" class="btn btn-primary">
										            Historial Médico
										        </a>
									        </td>
									    </tr>
									     <?php
									    		}}
										?>
									    @endforeach
									  </table>
					</section>
					<section id="section-5">
								<a href="{{ route('user.users.edit', $id) }}" class="btn btn-primary">
									            Editar información
									          </a>
								<article id="infodoc" style="font-size: 10px;">
									<div id="profpic"class="prof_pic"><img src="<?php echo asset('assets/images/' . $user->foto); ?>"></div>
							        <header>
							            <h3>Horario:</h3>
							        </header>
							            <p>{{ $user->horario }}</p>	                  
							        <header>
							            <h3>Teléfono Consultorio: </h3>
							        </header>
							            <p>{{ $user->telefono1 }}</p>
							            <p>{{ $user->telefono2 }}</p>
							        <header>
							            <h3>Información</h3>
							        </header>
							        <div >
							           {{ $user->informacion }}
							        </div>
							        <header>
							            <h3>Consultorio:</h3>
							        </header>
							            <p>{{ $user->direccion }}</p>
							    </article>
					</section>
					<section id="section-6">
								<!--<iframe src="http://localhost/dm/public/admin/userespecialidads/create" style="width: 90%; height: 400px;"></iframe>-->
								<span>Especialidades a la que pertenece</span>
								<?php
								 $userespecialidad= Userespecialidads::where('User', '=', $id)->get();
								?>
						<div class="row">
							        @foreach ($userespecialidad as $userespecialidad)
							        <?php
							         $Especialidades = Especialidad::find($userespecialidad->Especialidad);
							        ?>
									<div class="col-md-4">
							            <p class="perspective">
							              <a id="doc" class="btn2  btn2-8 btn2-8f" href="#" role="button">{{ $Especialidades->nombre }}</a>
							            </p> 
							        </div>
							       @endforeach
	   					</div>
					</section>
				</div><!-- /content -->
			</div><!-- /tabs -->
		</div>
{{ HTML::script('assets/phpToPDF.php') }}
		<ul id="cbp-tm-menu" class="cbp-tm-menu">
				<li>
					<a href="{{ url('/') }}">Inicio</a>
				</li>
				<li>
		          <a href="{{ route('user.pdf.create') }}" class="cbp-tm-icon-contract">ver Reporte</a>
		        </li>
				<!--<li>
					<a href="#">Informacion</a>
					<ul class="cbp-tm-submenu">
						<li><a href="#" class="cbp-tm-icon-archive">Sorrel desert</a></li>
						<li><a href="#" class="cbp-tm-icon-cog">Raisin kakadu</a></li>
						<li><a href="#" class="cbp-tm-icon-location">Plum salsify</a></li>
						<li><a href="#" class="cbp-tm-icon-users">Bok choy celtuce</a></li>
						<li><a href="#" class="cbp-tm-icon-earth">Onion endive</a></li>
						<li><a href="#" class="cbp-tm-icon-location">Bitterleaf</a></li>
						<li><a href="#" class="cbp-tm-icon-mobile">Sea lettuce</a></li>
					</ul>
				</li>
				<li>
					<a href="#">Contacto</a>
					<ul class="cbp-tm-submenu">
						<li><a href="#" class="cbp-tm-icon-archive">Brussels sprout</a></li>
					</ul>
				</li>-->
				<li>
					<a href="{{ url('/logout') }}">Cerrar Sesión</a>
				</li>
			</ul>
		{{ HTML::script('assets/js/cbpTooltipMenu.min.js') }}
		<script>
			var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
		</script>
		{{ HTML::script('assets/js/cbpFWTabs.js') }}
		<script>
			new CBPFWTabs( document.getElementById( 'tabs' ) );
		</script>
<!--<script type="text/javascript">
    setTimeout(function () { 
      location.reload();
    }, 60 * 1000);
</script>-->
</body>
</html>
