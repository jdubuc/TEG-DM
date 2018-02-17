<?php

class user_historiapacienteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$historiapaciente = historiapaciente::all();
        return View::make('user/historiapaciente/list')->with('historiapaciente', $historiapaciente);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        if( isset($_POST['cars']) )
{
        echo $_POST ['cars'];
}

		$historiapaciente = new historiapaciente;
        $request = new Request();
        $input = Input::all();
        //dd($input);
        //$cita = Cita::find($id);
        //$historiapaciente->citas=$id;
		//return View::make('user/historiapaciente/form')->with('historiapaciente', $historiapaciente);
        //return View::make('user/historiapaciente/form', compact('historiapaciente', 'id'));
        //return View::make('user/historiapaciente/form')->with('historiapaciente', $historiapaciente,$input)->with($input['id']);
        return View::make('user/historiapaciente/form')->with('historiapaciente', $historiapaciente);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        
		 // Creamos un nuevo objeto 
        $historiapaciente = new historiapaciente;

        $historiapacienteenfermedad = new historiapacienteenfermedad;
        $historiapacientesintomasysignos = new historiapacientesintomasysignos;
        $historiapacientemedicina = new historiapacientemedicina;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
         //     var_dump( );
        $arraysintomas_signos = $data["sintomas_signos"];
        $data["sintomas_signos"] = implode(",", $arraysintomas_signos);
        $arraymedicamentos = $data["medicamentos"];
        $data["medicamentos"] = implode(",", $arraymedicamentos);
        $arraydiagnostico = $data["diagnostico"];
        $data["diagnostico"] = implode(",", $arraydiagnostico);
      //  echo $comma_separated; // lastname,email,phone
      //  echo $data["cars"][0];
        //echo $_POST ['cars[]'];
        // Revisamos si la data es válido
        //dd($arraysintomas_signos);
      if ($historiapaciente->isValid($data))
        {
            // Si la data es valida se la asignamos 
            $historiapaciente->sintomas_signos=$data["sintomas_signos"];
            $historiapaciente->medicamentos=$data["medicamentos"];
            $historiapaciente->diagnostico=$data["diagnostico"];
            $historiapaciente->observaciones=$data["observaciones"];
            $historiapaciente->tratamiento=$data["tratamiento"];
            $historiapaciente->citas=$data["citas"];
            $historiapaciente->paciente=$data["paciente"];
             $historiapaciente->fill($data);

            // Guardamos 
                $citaa = Cita::find($data["citas"]);
                $citaa->estado='2';
                $citaa->save();
           
                $historiapaciente->save();
            

             foreach ($arraymedicamentos as $arraymedicamentos) {
            // $arraymedicamentos2 = explode(",", $arraymedicamentos); 
            // foreach ($arraymedicamentos2 as $arraymedicamentos2) {
             $medicamentos2 = explode("/", $arraymedicamentos);
            // $medicamentos = explode(",", $medicamentos2[0]);
             //dd($medicamentos2);
             $medic = medicina:: where('nombre', '=', $medicamentos2[0])->firstOrFail();
             $idd=$medic->id;
             $historiapacientemedicina = new Historiapacientemedicina;
                $historiapacientemedicina->medicina=$medic->id;
                $historiapacientemedicina->historiapaciente=$historiapaciente->id;
                $historiapacientemedicina->save();
            }

        
            foreach ( $arraysintomas_signos as  $arraysintomas_signos) { 
               
             $sintomas_signospaciente = sintomasysignos:: where('nombre', '=', $arraysintomas_signos)->firstOrFail();
            
             $historiapacientemsintomasysignos = new Historiapacientesintomasysignos;

                $historiapacientemsintomasysignos->sintomasysignos=$sintomas_signospaciente->id;
                $historiapacientemsintomasysignos->historiapaciente=$historiapaciente->id;
                 //dd($historiapacientemsintomasysignos);
                $historiapacientemsintomasysignos->save();
            }
            
           
            foreach ($arraydiagnostico as $arraydiagnostico) {
               
             $diagnosticopaciente = enfermedad:: where('nombre', '=', $arraydiagnostico)->firstOrFail();
             
             $historiapacienteenfermedad = new Historiapacienteenfermedad;
                $historiapacienteenfermedad->enfermedad=$diagnosticopaciente->id;
                $historiapacienteenfermedad->historiapaciente=$historiapaciente->id;
                //dd($historiapacienteenfermedad);
                $historiapacienteenfermedad->save();
            }
             
            return View::make('hello');
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            return Redirect::route('user.historiapaciente.create')->withInput()->withErrors($historiapaciente->errors);
             
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
		$historiapaciente = historiapaciente::find($id);
        
        if (is_null($historiapaciente)) App::abort(404);
        
      return View::make('user/historiapaciente/show', array('historiapaciente' => $historiapaciente));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$historiaspaciente = historiapaciente::find($id);
        if (is_null ($historiaspaciente))
        {
            App::abort(404);
        }
        
        $form_data = array('route' => array('user.historiapaciente.update', $historiaspaciente->id), 'method' => 'PATCH');
        $action    = 'Editar';
        
        return View::make('user/historiapaciente/form', compact('historiapaciente', 'form_data', 'action'));
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
        $historiapaciente = historiapaciente::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($historiapaciente))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($historiapaciente->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $historiapaciente->fill($data);
            // Guardamos el usuario
            $historiapaciente->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('user.historiapaciente.show', array($historiapaciente->id));
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('user.historiapaciente.edit', $historiapaciente->id)->withInput()->withErrors($historiapaciente->errors);
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
		/*$historiapaciente = historiapaciente::find($id);
        
        if (is_null ($historiapaciente))
        {
            App::abort(404);
        }
        
        $historiapaciente->delete();

        return Redirect::route('admin.historiaspaciente.index');*/
        $historiapaciente = historiapaciente::find($id);
        
        if (is_null ($historiapaciente))
        {
            App::abort(404);
        }
        
        $historiapaciente->delete();

        if (Request::ajax())
        {
            return Response::json(array (
                'success' => true,
                'msg'     => 'historiapaciente' . $historiapaciente->nombre_paciente . ' eliminado',
                'id'      => $historiapaciente->id
            ));
        }
        else
        {
            return Redirect::route('user.historiapaciente.index');
        }
	}
	


}
