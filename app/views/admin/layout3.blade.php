<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Directorio')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Bootstrap --}}
    {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/templateuser.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/mainesp.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/c.css', array('media' => 'screen')) }}

    {{ HTML::style('assets/css/default.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/component.css', array('media' => 'screen')) }}

    {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    <!--[if lt IE 9]>
        {{ HTML::script('assets/js/html5shiv.js') }}
        {{ HTML::script('assets/js/respond.min.js') }}
    <![endif]-->
  </head>
  <body>
    
   <!-- <video  id="videop" autoplay="true" loop="true">
      <source src="http://localhost/dm/public/assets/video/BigBuckBunny_640x360.mp4" type="video/mp4">
      <source src="assets/video/BigBuckBunny_640x360.ogv" type="video/ogg">
        </video>-->
    {{-- Wrap all page content here --}}
  
      {{-- Begin page content --}}
        <!-- comandos de video autoplay loop -->
        
    
        @yield('content')
      
    <ul id="cbp-tm-menu" class="cbp-tm-menu">
        <li>
          <a href="{{ url('/') }}">Home</a>
        </li>
        <li>
          <a href="#">Veggie made</a>
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
          <a href="#">Pepper tatsoi</a>
          <ul class="cbp-tm-submenu">
            <li><a href="#" class="cbp-tm-icon-archive">Brussels sprout</a></li>
            <li><a href="#" class="cbp-tm-icon-cog">Kakadu lemon</a></li>
            <li><a href="#" class="cbp-tm-icon-link">Juice green</a></li>
            <li><a href="#" class="cbp-tm-icon-users">Wine fruit</a></li>
            <li><a href="#" class="cbp-tm-icon-earth">Garlic mint</a></li>
            <li><a href="#" class="cbp-tm-icon-location">Zucchini garnish</a></li>
            <li><a href="#" class="cbp-tm-icon-mobile">Sea lettuce</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Sweet melon</a>
          <ul class="cbp-tm-submenu">
            <li><a href="#" class="cbp-tm-icon-screen">Sorrel desert</a></li>
            <li><a href="#" class="cbp-tm-icon-mail">Raisin kakadu</a></li>
            <li><a href="#" class="cbp-tm-icon-contract">Plum salsify</a></li>
            <li><a href="#" class="cbp-tm-icon-pencil">Bok choy celtuce</a></li>
            <li><a href="#" class="cbp-tm-icon-article">Onion endive</a></li>
            <li><a href="#" class="cbp-tm-icon-clock">Bitterleaf</a></li>
          </ul>
        </li>
      </ul>
      {{ HTML::script('assets/js/cbpTooltipMenu.min.js') }}
    <script>
      var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
    </script>
    {{-- jQuery (necessary for Bootstrap's JavaScript plugins) --}}
    <script src="//code.jquery.com/jquery.js"></script>
    {{-- Include all compiled plugins (below), or include individual files as needed --}}
    {{ HTML::script('assets/js/jquery-1.9.1.min.js') }}
     {{ HTML::script('assets/js/c.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/admin.js') }}
  </body>
</html>