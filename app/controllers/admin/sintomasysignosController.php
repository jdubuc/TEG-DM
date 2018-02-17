<?php

class User_sintomasysignosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sintomasysignos = Sintomasysignos::orderBy('nombre')->get();
        return View::make('user/sintomasysignos/list2')->with('sintomasysignos', $sintomasysignos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$sintomasysignos = new Sintomasysignos;
      return View::make('user/sintomasysignos/form')->with('sintomasysignos', $sintomasysignos);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $sintomasysignos = new Sintomasysignos;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($sintomasysignos->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $sintomasysignos->fill($data);
            // Guardamos el usuario
            $sintomasysignos->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            
            return Redirect::route('user.sintomasysignos.show', array($sintomasysignos->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
		return Redirect::route('user.sintomasysignos.create')->withInput()->withErrors($sintomasysignos->errors);
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
		$sintomasysignos = Sintomasysignos::find($id);
        
        if (is_null($sintomasysignos)) App::abort(404);
        
      return View::make('user/sintomasysignos/show', array('sintomasysignos' => $sintomasysignos));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sintomasysignos = Sintomasysignos::find($id);
		if (is_null ($sintomasysignos))
		{
		App::abort(404);
		}

		return View::make('user/sintomasysignos/form')->with('sintomasysignos', $sintomasysignos);
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
        $sintomasysignos = Sintomasysignos::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($sintomasysignos))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($sintomasysignos->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $sintomasysignos->fill($data);
            // Guardamos el usuario
            $sintomasysignos->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('user.sintomasysignos.show', array($sintomasysignos->id));
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('user.sintomasysignos.edit', $sintomasysignos->id)->withInput()->withErrors($sintomasysignos->errors);
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
