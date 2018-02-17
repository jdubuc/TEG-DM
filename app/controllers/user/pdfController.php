<?php

class User_pdfController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$pdf = new pdf;
      return View::make('user/pdf/form')->with('pdf', $pdf);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Obtenemos la data enviada por el usuario
        $data = Input::all();
        $id = Auth::user()->id;
        //dd($data);
        if($data['reporte']=='citas'){
        	$vistacita=DB::table('vistacita')->where('iduser','=', $id)->where('ano','=', $data['vistacitaano'])->get();
        	return View::make('user/pdf/showCitas')->with('vistacita',$vistacita);
        }
        if($data['reporte']=='enfermedades'){
        	$vistacita=DB::table('vistaenfermedad')->where('iduser','=', $id)->where('ano','=', $data['vistacitaano'])->get();
        	return View::make('user/pdf/showEnfermedades')->with('vistacita',$vistacita);
        }
        if($data['reporte']=='medicamentos'){
        	$vistacita=DB::table('vistamedicina')->where('iduser','=', $id)->where('ano','=', $data['vistacitaano'])->get();
        	return View::make('user/pdf/showMedicamentos')->with('vistacita',$vistacita);
        }
        if($data['reporte']=='sintomasysignos'){
        	$vistacita=DB::table('vistasintomasysignos')->where('iduser','=', $id)->where('ano','=', $data['vistacitaano'])->get();
        	return View::make('user/pdf/showSintomasysignos')->with('vistacita',$vistacita);	
        }
        //dd($vistacita);
            //return View::make('user/pdf/show')->with('vistacita',$vistacita);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		/*$vistacita = Input::all();
		dd($vistacita);
		$pdf= new pdf;
        
      return View::make('user/pdf/show')->with('vistacita',$vistacita);*/
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
