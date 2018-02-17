<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>@yield('title', 'Zitat Bienvenido')</title>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>
    {{ HTML::style('assets/css/componentmu.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/timeline/reset.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/timeline/style.css', array('media' => 'screen')) }}
    {{ HTML::script('assets/js/timeline/modernizr.js') }}

</head>
  <body>

 @yield('content')


 <ul id="cbp-tm-menu" class="cbp-tm-menu">
        <li>
          <a href="{{ url('/') }}">Inicio</a>
        </li>
        <li>
              <a href="{{ route('user.pdf.create') }}" class="cbp-tm-icon-contract">ver Reporte</a>
              
            </li>
        <li>
          <a href="{{ url('/logout') }}">Cerrar Sesión</a>
        </li>
      </ul>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
{{ HTML::script('assets/js/timeline/main.js') }}
<script type="text/javascript">
    

$('#personalizar').click(function() {
    $('#causa').css({
        'margin': '0px',
       
        'font-size': '0px'
    });
});

</script>
  </body>
</html>