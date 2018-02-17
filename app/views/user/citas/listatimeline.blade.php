@extends ('user/layoutlistacitas')

@section ('title') Lista de citas @stop




@section ('content')

  <h1>Lista de citas</h1>
  <p>
    <a href="{{ route('admin.citas.create') }}" class="btn btn-primary">Crear una nueva cita</a>
  </p>

<h1>Nombre del paciente: {{ $cita->nombre_paciente }} {{ $cita->apellido_paciente }}</h1>
<h1>Cedula:{{ $cita->cedula_paciente }} </h1>
<p>Resumen historial medico y citas. <br><br>
@foreach ($cita as $cita)
  </p>
<ul id="timeline">
  <li class="event">
    <span class="date">Fecha:{{ $cita->fecha_cita }}</span>
                    
    <p>Razon de cita:{{ $cita->razon_cita }} <br> Hora:{{ $cita->hora }}</p>
  </li>
  </ul>
@endforeach
<p>
  Fin de Historial <a href="#" class="entypo-behance"> Volver</a>
</p>

@stop