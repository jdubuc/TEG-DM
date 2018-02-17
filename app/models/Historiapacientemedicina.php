<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class historiapacientemedicina extends Eloquent implements UserInterface, RemindableInterface  {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'historiapacientemedicina';
   
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
    protected $hidden = array('remember_token');

	public $errors;
    
    /*public function isValid($data)
    {
        $rules = array(
            /*'Especialidad'     => 'required|unique:especialidades',
            'User' => 'required|unique:users'  **
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;

    }*/
protected $fillable = array('historiapaciente','medicina');
}
