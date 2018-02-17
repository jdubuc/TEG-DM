<?php

class user_enfermedadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$enfermedad = Enfermedad::orderBy('nombre')->get();
        return View::make('user/enfermedad/list2')->with('enfermedad', $enfermedad);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Session::has('backUrl')) {
				   Session::keep('backUrl');
				}
		$enfermedad = new Enfermedad;
      return View::make('user/enfermedad/form')->with('enfermedad', $enfermedad);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Session::has('backUrl')) {
				   Session::keep('backUrl');
				}
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $enfermedad = new Enfermedad;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($enfermedad->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $enfermedad->fill($data);
            // Guardamos el usuario
            $enfermedad->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            
            //return Redirect::route('user.enfermedad.show', array($enfermedad->id));
            $url = Session::get('backUrl');
            return Redirect::to($url);
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
		return Redirect::route('user.enfermedad.create')->withInput()->withErrors($enfermedad->errors);
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
		$enfermedad = Enfermedad::find($id);
        
        if (is_null($enfermedad)) App::abort(404);
        
      return View::make('user/enfermedad/show', array('enfermedad' => $enfermedad));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$enfermedad = Enfermedad::find($id);
		if (is_null ($enfermedad))
		{
		App::abort(404);
		}

		return View::make('user/enfermedad/form')->with('enfermedad', $enfermedad);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $enfermedad = Enfermedad::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($enfermedad))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($enfermedad->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $enfermedad->fill($data);
            // Guardamos el usuario
            $enfermedad->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('user.enfermedad.show', array($enfermedad->id));
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('user.enfermedad.edit', $enfermedad->id)->withInput()->withErrors($enfermedad->errors);
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
		//
	}


}
