@extends ('user/layoutlistacitas')

@section ('title') Lista de citas @stop




@section ('content')

  <h1>Lista de citas</h1>
  <p>
    <a href="{{ route('admin.citas.create') }}" class="btn btn-primary">Crear una nueva cita</a>
  </p>
                      <?php

                      $pacientecita = paciente::find($cita->paciente);
                      ?>
<h1>Nombre del paciente: {{ $pacientecita->nombre }} {{ $pacientecita->apellido }}</h1>
<h1>Cedula:{{ $pacientecita->cedula }} </h1>
<p>Resumen historial medico y citas. <br><br>
@foreach ($cita as $cita)
  </p>
<ul id="timeline">
  <li class="event">
    <span class="date">Fecha:{{ $cita->fecha_cita }}</span>
                    <?php
                      $doctorcita = User::find($cita->User);
                      $doctorcitaespecialidad = userespecialidad::find($doctorcitaespecialidad->User);
                      $especialidades = especialidades::find($doctorcitaespecialidad->User);
                      ?>
    <h5>Dr {{ $doctorcita->nombre }} {{ $doctorcita->apellido }}/ Especialidad</h5>
    @foreach ($especialidades as $especialidades)
    {{ $especialidades->nombre }}
    @endforeach
    <p>Razon de cita:{{ $cita->razon_cita }} <br> Hora:{{ $cita->hora }}</p>
  </li>
  </ul>
@endforeach
<p>
  Fin de Historial <a href="#" class="entypo-behance"> Volver</a>
</p>

@stop