<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Directorio')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Bootstrap --}}
    {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/templateuser.css', array('media' => 'screen')) }}
    <!--{{ HTML::style('assets/css/mainesp.css', array('media' => 'screen')) }}-->
    {{ HTML::style('assets/css/c.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/component.css', array('media' => 'screen')) }}
    {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    <!--[if lt IE 9]>
        {{ HTML::script('assets/js/html5shiv.js') }}
        {{ HTML::script('assets/js/respond.min.js') }}
    <![endif]-->
  </head>
  <body>
    <img src="<?php echo asset('assets/images/zitat.png'); ?>">
    <div id="container"></div>
   <!-- <video  id="videop" autoplay="true" loop="true">
      <source src="http://localhost/dm/public/assets/video/BigBuckBunny_640x360.mp4" type="video/mp4">
      <source src="assets/video/BigBuckBunny_640x360.ogv" type="video/ogg">
        </video>-->
    {{-- Wrap all page content here --}}
  
      {{-- Begin page content --}}
        <!-- comandos de video autoplay loop -->
        
    
        @yield('content')
      
    

    {{-- jQuery (necessary for Bootstrap's JavaScript plugins) --}}
    <script src="//code.jquery.com/jquery.js"></script>
    {{-- Include all compiled plugins (below), or include individual files as needed --}}
    {{ HTML::script('assets/js/jquery-1.9.1.min.js') }}
     {{ HTML::script('assets/js/c.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/classie.js') }}
    {{ HTML::script('assets/js/admin.js') }}
  </body>
</html>