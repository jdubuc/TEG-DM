<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>@yield('title', 'Inicio de Sesión de administrador')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     {{ HTML::style('css/bootstrap.css'); }}
     {{-- Bootstrap --}}
    
    {{ HTML::style('assets/css/stylenested.css', array('media' => 'screen')) }}
    {{ HTML::script('assets/js/jquery.nested.js') }}
    {{ HTML::script('assets/js/makeboxes.js') }}

    {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    <!--[if lt IE 9]>
        {{ HTML::script('assets/js/html5shiv.js') }}
        {{ HTML::script('assets/js/respond.min.js') }}
    <![endif]-->
        <style type="text/css">
                input {
                  outline: none;
                }

                #wrapper {
                  width: 100%;
                  height: 100%;
                  margin: 0 auto;
                }

                #box {
                  width: 345px;
                  height: 450px;
                  background-color: #fff;
                  margin: 0 auto;
                  -webkit-border-radius: 4px;
                  -o-border-radius: 4px;
                  -moz-border-radius: 4px;
                  border-radius: 3px;
                }

                #top_header {
                  width: 100%;
                  margin: 0;
                  padding-top: 45px;
                }

                #top_header > h3 {
                  text-align: center;
                  font-family: 'Lato', sans-serif;
                  font-size: 32px;
                  font-weight: 800;
                  color: #378DE5;
                  -webkit-text-stroke: 0.5px;
                  margin: 0;

                }

                #top_header > h5 {
                  text-align: center;
                  font-family: 'Roboto', sans-serif;
                  font-size: 15px;
                  font-weight: 300;
                  color: #378DE5;
                  line-height: 1.6;
                  margin: 0;
                  padding: 15px 0;
                  color: #555;
                  -webkit-text-stroke: 0.2px;
                }

                #inputs {
                  width: 100%;
                  height: 100%;
                  margin: 0 auto;
                  position: relative;
                }

                input[type=text], input[type=password], input[type=submit] {
                  width: 300px;
                  height: 55px;
                  position: relative;
                  margin: 0 auto;
                  display: block;
                  margin-bottom: -10px;
                  padding: 15px;
                  box-sizing: border-box;
                  -webkit-text-stroke: 0.1px;
                }

                input[type=text], input[type=password] {
                  font-family: 'Lato', sans-serif;
                  font-weight: 300;
                  font-size:16px; 
                  border: thin solid #ccc;
                  border-radius: 5px;
                  color: #378DE5;
                }

                input[type=text]:focus, input[type=password]:focus {
                  border: thin solid #378DE5;
                  -webkit-transition: all .4s ease;
                  -moz-transition: all .4s ease;
                  -o-transition: all .4s ease;
                  transition: all .4s ease;
                }

                input[type=text]:focus, input[type=password]:focus {
                  border-left: thin solid #378DE5;
                }


                input[type=submit] {
                  color: #378DE5;
                  background-color: #fff;
                  border: 1px solid #378DE5;
                  border-radius: 5px;
                  font-family: 'Roboto', sans-serif;
                  font-weight: 300;
                  font-size: 16px;
                  transition: all .3s ease;
                  margin-top: 0px;
                  cursor: pointer;
                }

                input[type=submit]:hover {
                  background-color: #378DE5;
                  color: #fff;
                }

                #bottom {
                  width: 300px;
                  margin: 0 auto;
                  margin-top: 15px;
                }

                a {
                  text-decoration: none;
                  color: #282828;
                  font-size: 13px;
                  font-family: 'Roboto', sans-serif;
                  font-weight: 300;
                  transition: color .3s ease;
                  outline: none;
                }

                a:hover {
                  color: #1eb056;
                }

                .right_a {
                  float: right;
                }
                #username {
                  margin-bottom: 15px;
                }
                #password {
                  margin-bottom: 25px;
                }
                 .checkbox {
                  margin-top: 25px;
                }

        </style>
       <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Gafata|Nobile:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->
    
  </head>
  <body>
      <!--<img src="<?php echo asset('assets/images/zitat.png'); ?>">-->
    <iframe src="http://localhost/dm/Nested/index2.html" style="height:90%;width:100%;margin-top: -700px;"frameborder="0"></iframe>

    {{-- Wrap all page content here --}}
    <div id="wrap">
      {{-- Begin page content --}}
      <div class="container">
        @yield('content')
      </div>
    </div>




    
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   
  </body>
</html>