<?php

class Admin_userespecialidadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'Aqui mostramos las listas';
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
   {
      $userespecialidad = new Userespecialidads;
      return View::make('admin/userespecialidads/form')->with('userespecialidads', $userespecialidad);
   }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//return Input::all();
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $userespecialidad = new Userespecialidads;
        // Obtenemos la data enviada por el usuario
        //$data = Input::all();
        
        
            //$userespecialidad->fill($data);
            // Guardamos el usuario
            $userespecialidad->User=Input::get('User');;
            $userespecialidad->Especialidad=Input::get('Especialidad');;
            $userespecialidad->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.userespecialidads.create');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
   {
    $userespecialidad= Userespecialidads::where('Especialidad', '=', $id)->take(20)->get();
    return View::make('admin/userespecialidads/list2')->with('userespecialidads', $userespecialidad);
   }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
   {
      return 'Aqui editamos el usuario: ' . $id;
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
