@extends ('user/layoutlistacitas')

@section ('title') Lista de citas @stop




@section ('content')

  <h1>Lista de citas</h1>
  <p>
    
    <a href="{{ url('/') }}" class="entypo-behance"> Volver</a>
  </p>
                      
<h1>Nombre del paciente: {{ $paciente->nombre }} {{ $paciente->apellido }}</h1>
<h1>Cedula:{{ $paciente->cedula }} </h1>

<p>Resumen historial medico y citas. <br><br>
                    <?php
                    $cita = Cita::where('paciente', '=', $paciente->id)->orderBy('fecha_cita', 'desc')->get();
                    ?><a href="#" id="personalizar">Personalizar</a></li>
@foreach ($cita as $cita)
  </p>
    <ul id="timeline">
      <li class="event">
        <span class="date">Fecha:{{ $cita->fecha_cita }}</span>
         <span class="date">Hora de la cita:{{ $cita->hora }}</span>
         <?php
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
         <span class="date"><a href="{{ route('user.citas.show', $cita->id) }}" class="btn btn-info">
                                Ver Cita
                            </a></span>
          <span id="historia" class="date"><div style="width: 300px; word-wrap: break-word;">Razon de la cita:<p align="justify">{{ $cita->razon_cita }}</p></div></span>
          <?php
           if($cita->estado==2){
              $historiapaciente = historiapaciente::where('citas', '=', $cita->id)->firstOrFail();    
          ?>
              <span id="diagnostico" class="date"><div style="width: 300px; word-wrap: break-word;">diagnostico:<p align="justify">{{ $historiapaciente->diagnostico }}</p></div></span>
              <span id="tratamiento" class="date"><div style="width: 300px; word-wrap: break-word;">tratamiento:<p align="justify">{{ $historiapaciente->tratamiento }}</p></div></span>
          <?php
            } 
          ?>
          
         <br>
                        <?php
                          $doctorcita = User::find($cita->User);
                          $doctorcitaespecialidad = userespecialidads::where('User', '=', $doctorcita->id)->get();  
                        ?>
            <h5>Dr {{ $doctorcita->nombre }} {{ $doctorcita->apellido }}</h5>
            Especialidades:
              @foreach ($doctorcitaespecialidad as $doctorcitaespecialidad)
              <?php
              $especialidades = Especialidad::find($doctorcitaespecialidad->Especialidad);
               ?>
               <span class="date"> <p >{{ $especialidades->nombre }}</p></span><br>
              @endforeach
        
      </li>
    </ul>
@endforeach
<p>
  Fin de Historial <a href="/dm/public/" class="entypo-behance"> Volver</a>
</p>
<ul id="cbp-tm-menu" class="cbp-tm-menu">
        <li>
          <a href="{{ url('/') }}">Inicio</a>
        </li>
        <li>
              <a href="{{ route('user.pdf.create') }}" class="cbp-tm-icon-contract">ver Reporte</a>
              
            </li>
        <!--<li>
          <a href="#">Informacion</a>
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
          <a href="#">Contacto</a>
          <ul class="cbp-tm-submenu">
            <li><a href="#" class="cbp-tm-icon-archive">Brussels sprout</a></li>
          </ul>
        </li>-->
        
        <li>
          <a href="{{ url('/logout') }}">Cerrar Sesión</a>
        </li>
      </ul>
@stop