<?php

class Admin_CitasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cita = Cita::all();
        return View::make('admin/citas/list')->with('cita', $cita);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$citas = new Cita;
		return View::make('admin/citas/form')->with('citas', $citas);
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
        
        // Revisamos si la data es válido
        if ($cita->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $cita->fill($data);
            // Guardamos el usuario
            $cita->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.citas.show', array($cita->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
return Redirect::route('admin.citas.create')->withInput()->withErrors($cita->errors);
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
        
      return View::make('admin/citas/show', array('cita' => $cita));
   
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cita = Cita::find($id);
        if (is_null ($cita))
        {
            App::abort(404);
        }
        
        $form_data = array('route' => array('admin.citas.update', $cita->id), 'method' => 'PATCH');
        $action    = 'Editar';
        
        return View::make('admin/citas/form', compact('cita', 'form_data', 'action'));
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
        $cita = Cita::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($cita))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($cita->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $cita->fill($data);
            // Guardamos el usuario
            $cita->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.citas.show', array($cita->id));
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('admin.citas.edit', $cita->id)->withInput()->withErrors($cita->errors);
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
		/*$cita = Cita::find($id);
        
        if (is_null ($cita))
        {
            App::abort(404);
        }
        
        $cita->delete();

        return Redirect::route('admin.citas.index');
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
            return Redirect::route('admin.citas.index');
        }*/
        $cita = Cita::find($id);
        $cita->estado='3';
        $cita->save();
        return Redirect::route('/');
	}


}
