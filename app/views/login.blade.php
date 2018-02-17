<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>@yield('title', 'Inicio de Sesión')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    {{ HTML::style('assets/css/loginuserstyle.css', array('media' => 'screen')) }}
     
  </head>
  <body>
      <img src="<?php echo asset('assets/images/zitat.png'); ?>">


    {{-- Wrap all page content here --}}
    <div class="wrapper">
      {{-- Begin page content --}}
      <div class="container">
        <h1 >Bienvenido</h1>

        {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
        @if(Session::has('mensaje_error'))
            {{ Session::get('mensaje_error') }}
        @endif
        {{ Form::open(array('url' => '/login','class' => 'form')) }}
                       
                            {{ Form::label('', '') }}
                            {{ Form::text('username', Input::old('username'), array('placeholder'=>'Nombre de Usuario','id'=>'username','class' => 'form-control')); }}
                           
                            {{ Form::label('', '') }}
                            {{ Form::password('password', array('placeholder'=>'Contraseña','class' => 'form-control')); }}
                            
                       <!-- <div class="checkbox">
                             <div class='container'>
                            <label>
                                Recordar contraseña
                                {{ Form::checkbox('rememberme', true) }}
                            </label>
                            </div>
                        </div>-->
                        {{ Form::submit('Enviar', array('class' => 'login-button')) }}
        {{ Form::close() }}

          
        
     </div>

      <ul class="bg-bubbles">
    <li><div class="x1">
        <div class=""></div>
    </div></li>
    <li><div class="x2">
        <div class=""></div>
    </div></li>
    <li><div class="x3">
        <div class="cloud"></div>
    </div></li>
    <li><div class="x4">
        <div class="cloud"></div>
    </div></li>
    <li><div class="x1">
        <div class=""></div>
    </div></li>
    <li><div class="x2">
        <div class=""></div>
    </div></li>
    <li><div class="x3">
        <div class=""></div>
    </div></li>
    <li><div class="x4">
        <div class=""></div>
    </div></li>
    <li></li>
    <li></li>
        <li></li>
       
  </ul>
    </div>



<ul id="cbp-tm-menu" class="cbp-tm-menu">
                <li>
                    <span>Copyright © 2016. All rights reserved.</span>
                </li>
</ul>
   
    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

         {{ HTML::script('assets/js/loginuserindex.js') }}

   
  </body>
</html>
   