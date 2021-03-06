<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>@yield('title', 'Zitat Bienvenido')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Bootstrap --}}
    {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/demou.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/componentu.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/defaultmu.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/componentmu.css', array('media' => 'screen')) }}
    {{ HTML::script('assets/js/modernizr.custom.js') }}
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



    {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    <!--[if lt IE 9]>
        {{ HTML::script('assets/js/html5shiv.js') }}
        {{ HTML::script('assets/js/respond.min.js') }}
    <![endif]-->

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

                $id = Auth::user()->id;
                $currentuser = User::find($id);
                $user= Auth::user();
  
                //$vistacita= Cita::where('User', '=', $id)->orderBy('fecha_cita')->take(20)->get();
                $citac= Cita::where('User', '=', $id)->orderBy('fecha_cita')->get();
                
                //echo $resultcit;
                $resultcit = count($citac);
                $cita2=0;
                $cita1=0;
                $cita3=0;
                $eneroR=0;
                $febreroR=0;
                $marzoR=0;
                $abrilR=0;
                $mayoR=0;
                $junioR=0;
                $julioR=0;
                $agostoR=0;
                $septiembreR=0;
                $octubreR=0;
                $noviembreR=0;
                $diciembreR=0;
                $enero=0;
                $febrero=0;
                $marzo=0;
                $abril=0;
                $mayo=0;
                $junio=0;
                $julio=0;
                $agosto=0;
                $septiembre=0;
                $octubre=0;
                $noviembre=0;
                $diciembre=0;
                      $dia=date("d");
                      $mes=date("m");
                      $ano=date("Y");
             foreach ($vistacita as $vistacita){
                 $anoconsulta=$vistacita->ano;
          
                      if($vistacita->mes==1)
                        {$enero++;
                          
                        }
                      if($vistacita->mes==2)
                        {$febrero++;
                           
                        }
                      if($vistacita->mes==3)
                        {$marzo++;
                          
                        }
                      if($vistacita->mes==4)
                        {$abril++;
                           
                        }
                      if($vistacita->mes==5)
                        {$mayo++;
                           
                        }
                      if($vistacita->mes==6)
                        {$junio++;
                           
                        }
                      if($vistacita->mes==7)
                        {$julio++;
                           
                        }
                      if($vistacita->mes==8)
                        {$agosto++;
                           
                        }
                      if($vistacita->mes==9)
                        {$septiembre++;
                           
                        }
                      if($vistacita->mes==10)
                        {$octubre++;
                           
                        }
                      if($vistacita->mes==11)
                        {$noviembre++;
                           
                        }
                      if($vistacita->mes==12)
                        {$diciembre++;
                           
                        }
                }//->select('nombreenfermedad')
               $vistaEnfermedad=DB::table('vistasintomasysignos')->select(DB::raw('sum(cantidad) as cantidad, nombresys'))->where('iduser','=', $id)->where('ano','=', $anoconsulta)->groupBy('nombresys')->get();
                ?>
            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');    
            data.addColumn('number', 'tipo');
            data.addRows([
              //['total de citas', <?php echo $resultcit ?>],
              <?php
            
            
              foreach ($vistaEnfermedad as $ve ) {
                 echo '[\'' . $ve->nombresys . '\',' . $ve->cantidad . '],';
              }
            

              ?>
            ]);
            // Create the data table.
            var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Topping');
            data2.addColumn('number', 'Slices');
            data2.addRows([
              <?php 
                
              echo '[\'apio\', 3],'
               ?>
              ['Mushrooms', 3],
              ['Onions', 1],
              ['Olives', 15],
              ['Zucchini', 1],
              ['Pepperoni', 2]
            ]);

            var data3 = new google.visualization.DataTable();
            data3.addColumn('string', 'meses');
            data3.addColumn('number', 'Cantidad Sintomas y signos');
            //data3.addColumn('number', 'C.Realizadas');
            data3.addRows([

              ['1', <?php echo $enero ?>],
              ['2', <?php echo $febrero ?>],
              ['3', <?php echo $marzo ?>],
              ['4', <?php echo $abril ?>],
              ['5', <?php echo $mayo ?>],
              ['6',  <?php echo $junio ?>],
              ['7', <?php echo $julio ?>],
              ['8', <?php echo $agosto ?>],
              ['9',  <?php echo $septiembre ?>],
              ['10', <?php echo $octubre ?>],
              ['11', <?php echo $noviembre ?>],
              ['12', <?php echo $diciembre ?>]
            ]);

            // Set chart options
            var options = {'title':'cantidad de Sintomas y signos en el año',
                           'width':400,
                           'height':300};
            // Set chart options
            var options2 = {'title':'How Much Pizza You Ate Last Night',
                           'width':400,
                           'height':300};
            // Set chart options
            var options3 = {'title':'Cantidad total de Sintomas y signos por mes',
                           'width':900,
                           'height':500};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            //var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
            //chart2.draw(data2, options2);
            var chart3 = new google.visualization.LineChart(document.getElementById('chart_div3'));
            chart3.draw(data3, options3);

          }
        </script>
  </head>
  <body>
    <img src="<?php echo asset('assets/images/zitat.png'); ?>">
    {{-- Wrap all page content here --}}
    <div id="wrap">
      {{-- Begin page content --}}

      <?php 
      date_default_timezone_set("America/New_York"); 
                    echo "La fecha es: " . date("m/d/Y"); ?> <br>  <?php 
                    echo "La hora es: " . date("h:i a"); ?> <br>  <?php 

      echo "Número total de citas:" . $resultcit ?> 
      <div class="container">
        @yield('content')
      </div>
    </div>


<ul id="cbp-tm-menu" class="cbp-tm-menu">
        <li>
          <a href="{{ url('/') }}">Inicio</a>
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
        <a class="btn btn-info" alt="Click para Imprimir esta página" title="Click para Imprimir esta página" 
href=javascript:window.print();>Imprimir esta página</a>
 </li>
        <li>
          <a href="{{ url('/logout') }}">Cerrar Sesión</a>
        </li>
      </ul>

    {{-- jQuery (necessary for Bootstrap's JavaScript plugins) --}}
    <script src="//code.jquery.com/jquery.js"></script>
    {{-- Include all compiled plugins (below), or include individual files as needed --}}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/admin.js') }}
    <script>
function myFunction() {
    alert("se agrego la relacion creo!");
}
</script>

{{ HTML::script('assets/js/cbpTooltipMenu.min.js') }}
    <script>
      var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
    </script>

  
    {{ HTML::script('assets/js/cbpFWTabs.js') }}
    <script>
      new CBPFWTabs( document.getElementById( 'tabs' ) );
    </script>


  </body>
</html>