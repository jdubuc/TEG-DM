@extends ('admin/layout')

@section ('title')  @stop

@section ('content')

<h1>Crear entrada historia paciente</h1>

{{ Form::open(array('route' => 'admin.historiapaciente.store', 'method' => 'POST'), array('role' => 'form')) }}

          <?php
              $users = User::orderBy('nombre')->get();
          ?>
          <select name="User" >
            @foreach ($users as $users)
                <option value="{{$users->id}}">Dr {{$users->nombre}} {{$users->apellido}} valor: {{$users->id}}</option>  
            @endforeach
          </select> 
            
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('sintomas signos', 'sintomas signos') }}
      {{ Form::text('sintomas_signos', null, array('placeholder' => 'Introduce sintomas signos', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('diagnostico', 'diagnostico') }}
      {{ Form::text('diagnostico', null, array('placeholder' => 'Introduce diagnostico', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('tratamiento', 'tratamiento') }}
      {{ Form::text('tratamiento', null, array('placeholder' => 'Introduce tratamiento', 'class' => 'form-control')) }}        
    </div>
    
    
  </div>
  {{ Form::button('Crear entrada historia paciente', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop