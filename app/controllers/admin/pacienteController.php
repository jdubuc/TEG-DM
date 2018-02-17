<?php

class admin_pacienteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		 $paciente = paciente::paginate();
        return View::make('admin/paciente/list')->with('paciente', $paciente);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$paciente = new paciente;
      return View::make('admin/paciente/form')->with('paciente', $paciente);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $paciente = new paciente;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($paciente->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $paciente->fill($data);
            // Guardamos el usuario
            $paciente->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.paciente.show', array($paciente->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
		return Redirect::route('admin.paciente.create')->withInput()->withErrors($paciente->errors);
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
		 $paciente = paciente::find($id);
        
        if (is_null($paciente)) App::abort(404);
        
      return View::make('admin/paciente/show', array('paciente' => $paciente));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$paciente = paciente::find($id);
		if (is_null ($paciente))
		{
		App::abort(404);
		}

		return View::make('admin/paciente/form')->with('paciente', $paciente);
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
        $paciente = paciente::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($paciente))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($paciente->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $paciente->fill($data);
            // Guardamos el usuario
            $paciente->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.paciente.show', array($paciente->id));
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('admin.paciente.edit', $paciente->id)->withInput()->withErrors($paciente->errors);
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
		/*$paciente = paciente::find($id);
        
        if (is_null ($paciente))
        {
            App::abort(404);
        }
        
        $paciente->delete();

        return Redirect::route('admin.paciente.index');*/

        $paciente = paciente::find($id);
        
        if (is_null ($paciente))
        {
            App::abort(404);
        }
        
        $paciente->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Usuario ' . $paciente->full_name . ' eliminado',
                'id'      => $paciente->id
            ));
        }
        else
        {
            return Redirect::route('admin.paciente.index');
        }
	}




}
