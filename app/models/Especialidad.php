<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Especialidad extends Eloquent implements UserInterface, RemindableInterface  {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'especialidades';
    protected $fillable = array('nombre');
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
    protected $hidden = array('password', 'remember_token');

	public $errors;
    
    public function isValid($data)
    {
        $rules = array(
            
            'nombre' => 'required|min:4|max:40',
            
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }
}
