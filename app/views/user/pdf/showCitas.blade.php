@extends ('user/layoutpdf2')

@section ('title') pdf  @stop

@section ('content')
 <?php 
 $id = Auth::user()->id;
	
 //$vistacita= DB::table('vistacita')->where('iduser', '=',  $id)->where('ano', '=', '2015')->get();

// $vistacitaano= DB::table('vistacita')->distinct()->select('ano')->where('iduser', '=',  $id)->get();

 //dd($vistacita);
	$mons = array(1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Deciembre"); 
 
   ?>
<div class="row">
	<div  class="col-xs-6 ">
<table style="width:100%">
  <tr>
  	<th>Cantidad de citas</th>
  	<th>Estado</th> 
    <th>Mes</th> 
    <th>Año</th>
  </tr>

@foreach($vistacita as $vc)

	<tr>
	    <td>{{ $vc->cantidadcitas }}</td>
	    @if($vc->estado==1)
	    <td>En espera</td>
	    @elseif($vc->estado==2)
	    <td>Realizada</td>
	    @elseif($vc->estado==3)
	    <td>Cancelada</td>
	    @endif
	    
	    <td>{{ $mons[$vc->mes] }}</td> 
	    <td>{{ $vc->ano }}</td>
  	</tr>
@endforeach

</table>
</div>

 <div id="chart_div" class="col-xs-4 "></div>
          <!--<div id="chart_div2" class="col-xs-4 "></div>-->
        <div  id="chart_div3" class="col-xs-9 "></div>
        
      
      </div>
@stop