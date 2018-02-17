@extends ('/adminlayoutlogin')

        {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
        @if(Session::has('mensaje_error'))
            {{ Session::get('mensaje_error') }}
        @endif
        

<div id="wrapper">
        <div id="box">
            <div id="top_header">
                <h3>Inicio de sesión</h3>
                <h5>Inicie sesión para continuar.</h5>
            </div>
        
        <div id="inputs">
        {{ Form::open(array('url' => '/login')) }}
            
                        <div class="form-group">
                            <div class='container'>
                            {{ Form::label('', '') }}
                            {{ Form::text('username', Input::old('username'), array('placeholder'=>'Nombre de Usuario','id'=>'username','class' => 'form-control')); }}
                            </div>
                        </div>
                        <div class="form-group">
                             <div class='container'>
                            {{ Form::label('', '') }}
                            {{ Form::password('password', array('placeholder'=>'Contraseña','class' => 'form-control')); }}
                            </div>
                        </div>
                        <div class="checkbox">
                             <div class='container'>
                            <label>
                                Recordar contraseña
                                {{ Form::checkbox('rememberme', true) }}
                            </label>
                            </div>
                        </div>
                        {{ Form::submit('Enviar', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}

            <div id="bottom">
              <a href="#">Crear una cuenta</a>
              <a class="right_a" href="#">Olvido Contraseña?</a>
            </div>
        </div>
        </div>
    </div>
   