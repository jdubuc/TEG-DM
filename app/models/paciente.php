<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class paciente extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'paciente';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('remember_token');
                
  
    
	public $errors;
    
    public function isValid($data)
    {
        $rules = array(
            'nombre' => 'required|min:3|max:40',
            'apellido' => 'required|min:3|max:40',
            'cedula' => 'required|min:1|max:10',
            'telefono1' => 'required|min:11|max:12',
            'procedencia' => 'required|min:8|max:45',
            'responsable' => 'required|min:5|max:45',
            'tlf_responsable' => 'min:11|max:12',
            'correo_electronico'  => 'required|email|unique:paciente|max:12',
            'alergias' => 'required|min:4|max:45',
            'num_registro'  => 'required|min:8|unique:paciente'
        );
         // Si el usuario existe:
        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el email del usuario actual
		$rules['email'] .= ',email,' . $this->id;
        }

        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }
    protected $fillable = array('nombre', 'apellido','cedula', 'telefono1','procedencia','responsable','tlf_responsable','correo_electronico','alergias','horario','num_registro');
}
