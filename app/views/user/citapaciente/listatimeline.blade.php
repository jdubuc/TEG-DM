@extends ('user/layoutlistacitas')

@section ('title') Lista de citas @stop




@section ('content')

  <header>

    <h1>Resumen historial medico y citas.</h1>
  
  </header>
                    <?php
                    $cita = Cita::where('paciente', '=', $paciente->id)->orderBy('fecha_cita', 'desc')->get();
                    ?>
  <section id="cd-timeline" class="cd-container">
    <div class="cd-timeline-block">
      <div class="cd-timeline-img cd-picture">
        <img src="<?php echo asset('assets/css/timeline/cd-icon-location.svg'); ?>" alt="Picture">
      </div> <!-- cd-timeline-img -->

      <div class="cd-timeline-content">
        <h2>Resumen historial medico y citas. </h2>
        <h1>Nombre del paciente:</h1><p> {{ $paciente->nombre }} {{ $paciente->apellido }}</p>
        <h1>Cedula:</h1><p>{{ $paciente->cedula }} </p>
        <a href="/dm/public/" class="btn btn-info"> Volver</a>
       <!--  <a href="#" id="personalizar" class="btn btn-info">Vista resumida</a>-->
        <a href="{{ route('user.paciente.show', $paciente->id) }}" class="btn btn-info">Ver paciente</a>
        <span class="cd-date">Datos</span>
      </div> <!-- cd-timeline-content -->
    </div> <!-- cd-timeline-block -->




@foreach ($cita as $cita)
    <div class="cd-timeline-block">
      <div class="cd-timeline-img cd-picture">
        <img src="<?php echo asset('assets/css/timeline/cd-icon-location.svg'); ?>" alt="Picture">
      </div> <!-- cd-timeline-img -->

      <div class="cd-timeline-content">
        <h2>Cita</h2><?php
           switch ($cita->estado) {
    case "1":
        echo "<span class=\"date\">Estado de la cita:En espera</span>";
        break;
    case "2":
        echo "<span class=\"date\">Estado de la cita:Realizada</span>";
        break;
    case "3":
        echo "<span class=\"date\">Estado de la cita:Cancelada</span>";
        break;
    default:
        echo "Estado de la cita:Desconocido";
}
          ?>
          <div id="causa"> <h1>Causa de la cita:</h1><p id="causa" align="justify">{{ $cita->razon_cita }}</p></div>
          <?php
           if($cita->estado==2){
              $historiapaciente = historiapaciente::where('citas', '=', $cita->id)->firstOrFail();    
          ?>
            <div style=" "><h1>Diagnostico:</h1><p align="justify">{{ $historiapaciente->diagnostico }}</p></div>
            <div style=" "><h1>Tratamiento:</h1><p align="justify">{{ $historiapaciente->tratamiento }}</p></div>
          <?php
            } 
          ?><br>
                        <?php
                          $doctorcita = User::find($cita->User);
                          $doctorcitaespecialidad = userespecialidads::where('User', '=', $doctorcita->id)->get();  
                        ?>
            <h5>Dr {{ $doctorcita->nombre }} {{ $doctorcita->apellido }}</h5>
            
        <!--<p>Lorem ipsum</p>-->
        <a href="{{ route('user.citas.show', $cita->id) }}" class="btn btn-info">Ver Cita</a>
        <span class="cd-date">Fecha:{{ $cita->fecha_cita }} Hora:{{ $cita->hora }}</span>
      </div> <!-- cd-timeline-content -->
    </div> <!-- cd-timeline-block -->
@endforeach

  <div class="cd-timeline-block">
      <div class="cd-timeline-img cd-picture">
        <img src="<?php echo asset('assets/css/timeline/cd-icon-location.svg'); ?>" alt="Picture">
      </div> <!-- cd-timeline-img -->

      <div class="cd-timeline-content">
        <h2>Fin de Historial</h2>
        
        <a href="{{ url('/') }}" class="btn btn-info">Volver</a>
        <span class="cd-date">Fin</span>
      </div> <!-- cd-timeline-content -->
    </div> <!-- cd-timeline-block -->


</section> <!-- cd-timeline -->








@stop