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
    {{ HTML::style('assets/css/componentmu.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/normalize.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/materialize.css', array('media' => 'screen')) }}


    {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    <!--[if lt IE 9]>
        {{ HTML::script('assets/js/html5shiv.js') }}
        {{ HTML::script('assets/js/respond.min.js') }}
    <![endif]-->
  </head>
  <body>
    <img src="<?php echo asset('assets/images/zitat.png'); ?>">
    {{-- Wrap all page content here --}}
    <div id="wrap">
      {{-- Begin page content --}}
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
          <a href="{{ url('/logout') }}">Cerrar Sesión</a>
        </li>
      </ul>

    {{-- jQuery (necessary for Bootstrap's JavaScript plugins) --}}
    <script src="//code.jquery.com/jquery.js"></script>
    {{-- Include all compiled plugins (below), or include individual files as needed --}}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/admin.js') }}
    {{ HTML::script('assets/js/jquery-1.9.1.min.js') }}
    {{ HTML::script('assets/js/modernizr.custom.js') }}
    {{ HTML::script('assets/js/materialize.js') }}

<script>
       $(document).ready(function() {
    $('select').material_select();
  });
    </script>

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