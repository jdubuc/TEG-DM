<?php

class user_citasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
       
		
	}

    


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$citas = new Cita;
		return View::make('user/citas/form')->with('citas', $citas);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 // Creamos un nuevo objeto para nuestro nuevo usuario
        $cita = new Cita;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        $array2 = $data["User"];
        $array3 = $data["paciente"];
    
        // Revisamos si la data es válido
        if ($cita->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $cita->fill($data);
            $cita->User=$array2;
            $cita->paciente=$array3;
            $cita->numero_expediente_paciente=$data["numero_expediente_paciente"];
            $cita->razon_cita=$data["razon_cita"];
            $cita->fecha_cita=$data["fecha_cita"];
            
            // Guardamos el usuario
            $cita->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            //return Redirect::route('user.citas.show', array($cita->id));
            return View::make('hello');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
        return Redirect::route('user.citas.create')->withInput()->withErrors($cita->errors);
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cita = Cita::find($id);
        
        if (is_null($cita)) App::abort(404);
        
      return View::make('user/citas/show', array('cita' => $cita));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$citas = Cita::find($id);
        if (is_null ($citas))
        {
            App::abort(404);
        }
       
        $form_data = array('route' => array('user.citas.update', $citas->id), 'method' => 'PATCH');
        $action    = 'Editar';
        
        return View::make('user/citas/form', compact('citas', 'form_data', 'action'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo cita
        $cita = Cita::find($id);
        
        // Si la cita no existe entonces lanzamos un error 404 :(
        if (is_null ($cita))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el cita
        $data = Input::all();
        $data["estado"]=1;
        //dd($data);
        // Revisamos si la data es válido
        if ($cita->isValid($data))
        {
            // Si la data es valida se la asignamos al cita
            $cita->fill($data);
            // Guardamos el cita
             $cita->estado=$data["estado"];
             //dd($cita);
            $cita->save();
            // Y Devolvemos una redirección a la acción show para mostrar el cita
            return Redirect::route('user.citas.show', array($cita->id));
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('user.citas.edit', $cita->id)->withInput()->withErrors($cita->errors);
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
        $cita = Cita::find($id);
        
        if (is_null ($cita))
        {
            App::abort(404);
        }
        
        $cita->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Cita' . $cita->nombre_paciente . ' eliminado',
                'id'      => $cita->id
            ));
        }
        else
        {
            return Redirect::to('/');
        }/*
        $cita = Cita::find($id);
        $cita->estado='3';
        $cita->save();
        return Redirect::route('/');*/
	}
	


}
