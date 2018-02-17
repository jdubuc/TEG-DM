<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Directorio')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Bootstrap --}}
    {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/sally/dialog-sally.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/sally/dialog.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/sally/demo.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/sally/normalize.css', array('media' => 'screen')) }}
    <!--{{ HTML::style('assets/css/mainesp.css', array('media' => 'screen')) }}-->
    
    {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    <!--[if lt IE 9]>
        {{ HTML::script('assets/js/html5shiv.js') }}
        {{ HTML::script('assets/js/respond.min.js') }}
    <![endif]-->
    <style>
#prof_pic {width: 30%; border-radius: 80%; text-align:  right;}

</style>
  </head>
  <body>
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
    {{ HTML::script('assets/js/sally/classie.js') }}
    {{ HTML::script('assets/js/sally/dialogFx.js') }}
    {{ HTML::script('assets/js/sally/modernizr.custom.js') }}
    {{ HTML::script('assets/js/sally/classie.js') }}
    {{ HTML::script('assets/js/sally/snap.svg-min.js') }}
  </body>
</html>