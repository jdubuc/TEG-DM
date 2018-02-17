<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Medicina extends Eloquent implements UserInterface, RemindableInterface  {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'medicina';
    
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
            
            'nombre' => 'required|min:1|max:40',
            'tipo' => 'required|min:1|max:40',
            'compuesto' => 'required|min:1|max:400',
            'cantidad' => 'required|min:1|max:40'
            
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }
    protected $fillable = array('nombre','tipo','compuesto','cantidad');
}
