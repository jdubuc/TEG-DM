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
		<link rel="shortcut icon" href="../favicon.ico">
		{{ HTML::style('assets/css/demou.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/componentu.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/defaultmu.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/componentmu.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<style>
      .stats {
        color: #73879C;
        /*background: #2A3F54;*/
        /*#ECF0F1; #FCFCFC*/
        font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
        font-size: 13px;
        font-weight: 400;
        line-height: 1.471;
      }
      .count_top {font-size: 13px;}
      .count {font-size: 40px;}
      .count_bottom {font-size: 13px;}
      .col-md-2 {width: 16.66666667%;}
    </style>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]--> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
          // Load the Visualization API and the piechart package.
          google.load('visualization', '1.0', {'packages':['corechart']});
          // Set a callback to run when the Google Visualization API is loaded.
          google.setOnLoadCallback(drawChart);
          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {
                <?php
                $citac= Cita::get();
                $resultcit = count($citac);
                $cita2=0;
                $cita1=0;
                $cita3=0;
                foreach ($citac as $citac){
                  if($citac->estado==1)
                        {$cita1++;}
                  if($citac->estado==2)
                        {$cita2++;}
                  if($citac->estado==3)
                        {$cita3++;}
                }
                 $ano=date("Y");
               $vistaEnfermedad=DB::table('vistaenfermedad')->select(DB::raw('sum(cantidad) as cantidad, nombreenfermedad'))->groupBy('nombreenfermedad')->get();
               
                ?>
            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');    
            data.addColumn('number', 'tipo');
            data.addRows([
              
              ['Cancelada', <?php echo $cita3 ?>],
              ['En espera', <?php echo $cita1 ?>],
              ['Realizada', <?php echo $cita2 ?>],
            ]);
            // Create the data table.
            var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Topping');
            data2.addColumn('number', 'Slices');
            data2.addRows([
               <?php
              foreach ($vistaEnfermedad as $ve ) {
                 echo '[\'' . $ve->nombreenfermedad . '\',' . $ve->cantidad . '],';
              }
              ?>
            ]);
            var data3 = new google.visualization.DataTable();
            data3.addColumn('string', 'mes');
            data3.addColumn('number', 'Citas');
            data3.addColumn('number', 'Citas Realizadas');
            data3.addRows([
              ['1', 1000, 400],
              ['2', 1170, 460],
              ['3',  860, 580],
              ['4', 1000, 400],
              ['5', 1170, 460],
              ['6',  860, 580],
              ['7', 1000, 400],
              ['8', 1170, 460],
              ['9',  860, 580],
              ['10', 1000, 400],
              ['11', 1170, 460],
              ['12', 1030, 540]
            ]);
            // Set chart options
            var options = {'title':'Citas segun estado',
                           'width':400,
                           'height':300};
            // Set chart options
            var options2 = {'title':'Enfermedades',
                           'width':400,
                           'height':300};
            // Set chart options
            var options3 = {'title':'Citas',
                           'width':500,
                           'height':500};
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
            chart2.draw(data2, options2);
            var chart3 = new google.visualization.LineChart(document.getElementById('chart_div3'));
            chart3.draw(data3, options3);
          }
        </script>
		{{ HTML::script('assets/js/modernizr.custom.js') }}
	</head>
<body>
	<?php
	$id = Auth::user()->id;
	$currentuser = User::find($id);
	$user= Auth::user();
   $userc= User::get();
   $resultuser = count($userc);
   $resultuser2 =0;
   $resultuser3 =0;
   foreach ($userc as $userc){
                  if($userc->tipo==1)
                        {$resultuser2++;}
                  if($userc->tipo==2)
                        {$resultuser3++;}
                }
    $medc= Medicina::get();
   $resultmed = count($medc);
    $sysc= sintomasysignos::get();
   $resultsys = count($sysc);
   $espc= Especialidad::get();
   $resultesp = count($espc);
   $pasc= Paciente::get();
   $resultpac = count($pasc); 
	?>
			<header class="clearfix">
				<img src="<?php echo asset('assets/images/zitat.png'); ?>">
				<span>Bienvenido Administrador {{ $user->nombre }} {{ $user->apellido }}.</span>
			</header>	
      <div class="row tile_count stats">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count"><?php echo $resultuser; ?></div>
              <span class="count_bottom"><i class="green"><?php echo $resultuser2; ?> </i> Medicos</span>
              <span class="count_bottom"><i class="green"><?php echo $resultuser3; ?> </i> Admin</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Pacientes</span>
              <div class="count"><?php echo  $resultpac; ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total medicinas</span>
              <div class="count"><?php echo $resultmed; ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Sintomas y signos</span>
              <div class="count"><?php echo $resultsys; ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Especialidades</span>
              <div class="count"><?php echo $resultesp; ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Citas</span>
              <div class="count"><?php echo $resultcit; ?></div>
            </div>
      </div>
      <div class="row">
        <div id="chart_div" class="col-xs-3 "></div>
        <div id="chart_div2" class="col-xs-3 "></div>
       <!--  <div id="chart_div3" class="col-xs-4 "></div> -->
        <div class="col-xs-2 ">
          <label for="names">Names: </label>
          <input id="names">
        </div>
      </div>
		<ul id="cbp-tm-menu" class="cbp-tm-menu">
				<li>
					<a href="#">Home</a>
				</li>
				<li>
          <a href="#">Opciones usuarios</a>
          <ul class="cbp-tm-submenu">
            <li><a href="{{ route('admin.users.index') }}" class="cbp-tm-icon-archive">Lista de Usuarios</a></li>
            <li><a href="{{ route('admin.users.create') }}" class="cbp-tm-icon-cog">Crear Usuario</a></li>
            <li><a href="#" class="cbp-tm-icon-location">Crear Admin</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Opciones pacientes</a>
          <ul class="cbp-tm-submenu">
            <li><a href="#" class="cbp-tm-icon-archive">Lista de pacientes</a></li>
            <li><a href="#" class="cbp-tm-icon-cog">Crear paciente</a></li>
            <li><a href="#" class="cbp-tm-icon-link">Lista Especialidades</a></li>
             <li><a href="{{ route('admin.userespecialidads.create') }}" class="cbp-tm-icon-link">Asignar Especialidad</a></li>
            <li><a href="{{ route('admin.especialidades.create') }}" class="cbp-tm-icon-users">Crear Especialidades</a></li>
          </ul>
        </li>
       <li>
              <a href="{{ route('admin.pdf.create') }}" class="cbp-tm-icon-contract">ver Reporte</a>
            </li>
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
    <script>
      $(function() {
        $( "#names" ).autocomplete({
          source: 'usernames'
        });
      });
    </script>
</body>
</html>
