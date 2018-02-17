<?php

class Admin_EspecialidadesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$especialidades = Especialidad::orderBy('nombre')->get();
        return View::make('admin/especialidades/list2')->with('especialidades', $especialidades);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$especialidades = new Especialidad;
      return View::make('admin/especialidades/form')->with('especialidades', $especialidades);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $especialidades = new Especialidad;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($especialidades->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $especialidades->fill($data);
            // Guardamos el usuario
            $especialidades->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            
            return Redirect::route('admin.especialidades.show', array($especialidades->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
		return Redirect::route('admin.especialidades.create')->withInput()->withErrors($especialidades->errors);
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
		$especialidades = Especialidad::find($id);
        
        if (is_null($especialidades)) App::abort(404);
        
      return View::make('admin/especialidades/show', array('especialidades' => $especialidades));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$especialidades = Especialidad::find($id);
		if (is_null ($especialidades))
		{
		App::abort(404);
		}

		return View::make('admin/especialidades/form')->with('especialidades', $especialidades);
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
        $especialidades = Especialidad::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($especialidades))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($especialidades->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $especialidades->fill($data);
            // Guardamos el usuario
            $especialidades->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.especialidades.show', array($especialidades->id));
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('admin.especialidades.edit', $especialidades->id)->withInput()->withErrors($especialidades->errors);
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
