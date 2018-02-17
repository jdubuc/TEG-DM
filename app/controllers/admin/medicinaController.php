<?php

class User_medicinaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$medicina = Medicina::orderBy('nombre')->get();
        return View::make('user/medicina/list2')->with('medicina', $medicina);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$medicina = new Medicina;
      return View::make('user/medicina/form')->with('medicina', $medicina);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $medicina = new Medicina;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($medicina->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $medicina->fill($data);
            // Guardamos el usuario
            $medicina->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            
            return Redirect::route('user.medicina.show', array($medicina->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
		return Redirect::route('user.medicina.create')->withInput()->withErrors($medicina->errors);
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
		$medicina = Medicina::find($id);
        
        if (is_null($medicina)) App::abort(404);
        
      return View::make('user/medicina/show', array('medicina' => $medicina));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$medicina = Medicina::find($id);
		if (is_null ($medicina))
		{
		App::abort(404);
		}

		return View::make('user/medicina/form')->with('medicina', $medicina);
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
        $medicina = Medicina::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($medicina))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($medicina->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $medicina->fill($data);
            // Guardamos el usuario
            $medicina->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('user.medicina.show', array($medicina->id));
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('user.medicina.edit', $medicina->id)->withInput()->withErrors($especialidades->errors);
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
