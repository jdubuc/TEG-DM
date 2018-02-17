@extends ('admin/layoutpdf')

<?php
  $form_data = array('route' => 'admin.pdf.store', 'method' => 'POST');
  
?>

@section ('title')  pdf @stop

@if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Por favor corrige los siguentes errores:</strong>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif

@section ('content')

<h1> pdf</h1>
<div class="row">
{{ Form::model($pdf, $form_data, array('role' => 'form')) }}
  @include ('user/errors', array('errors' => $errors))
      <?php
        $id = Auth::user()->id;
        $vistacitaano=DB::table('vistacita')->distinct()->select('ano')->get();
        //dd($vistacitaano);
      ?>
  <div class="col-xs-3 ">
    <select multiple="multiple" name="vistacitaano">
      <option value="" disabled selected>Click para seleccionar el año</option>
        @foreach ($vistacitaano as $vistacitaano)
          <option value="{{ $vistacitaano->ano }} ">{{ $vistacitaano->ano }}</option>
        @endforeach
    </select>
      <select multiple="multiple" name="reporte">
        <option value="" disabled selected>Click para seleccionar</option>
          <option value="citas">Citas</option>
          <option value="medicamentos">Medicamentos</option>
          <option value="sintomasysignos">Sintomas y Signos</option>
          <option value="enfermedades">Enfermedades</option>
      </select>
    
  

  {{ Form::button('Crear pdf', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  </div>
{{ Form::close() }}
        <div id="chart_div" class="col-xs-4 "></div>
          <!--<div id="chart_div2" class="col-xs-4 "></div>-->
        <div  id="chart_div3" class="col-xs-4 "></div>
      </div>
@stop