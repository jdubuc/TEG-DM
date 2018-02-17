<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Cita extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'citas';

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
            'numero_expediente_paciente'  => 'required|min:7|max:10',
            'razon_cita' => 'required|min:5|max:5000',
            'hora' => 'required|min:7|max:30',
            'fecha_cita' => 'required|min:7|max:15',
            'User' => 'required|min:1|max:40',
            'paciente' => 'required|min:1|max:40',
            'observaciones' => 'min:1|max:1500'
        );
         
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }
    protected $fillable = array('paciente','numero_expediente_paciente','razon_cita','fecha_cita','hora','User','observaciones');
}
