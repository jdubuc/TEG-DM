<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>@yield('title', 'Zitat Bienvenido')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Bootstrap --}}
    {{ HTML::style('assets/css/historialmedico.css', array('media' => 'screen')) }}
    <!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->

</head>
  <body>

 @yield('content')
<script type="text/javascript">
    

$('#personalizar').click(function() {
    $('#historia').css({
        'background-color': 'red',
        'color': 'white',
        'font-size': '44px'
    });
});

</script>
  </body>
</html>