<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class historiapaciente extends Eloquent implements UserInterface, RemindableInterface  {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'historiapaciente';
    /*protected $fillable = array('sintomas_signos');
    protected $fillable = array('diagnostico');
    protected $fillable = array('tratamiento');*/
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
            
            'sintomas_signos' => 'required|min:4|max:4500',
            'diagnostico' => 'required|min:4|max:4500',
            'tratamiento' => 'required|min:4|max:4500',
            'medicamentos' => 'required|min:4|max:4500',
            'citas' => 'min:1',
            'paciente' => '|min:',
            'observaciones' => '|min:1|max:4500'
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }
    protected $fillable = array('sintomas_signos','diagnostico','tratamiento','medicamentos','citas','paciente','observaciones');
}
