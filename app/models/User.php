<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
                
    public function getAuthIdentifier()
        {
            return $this->getKey();
        }

    public function getAuthPassword()
        {
            return $this->password;
        }

    public function getRememberToken()
        {
            return $this->remember_token;
        }

    public function setRememberToken($value)
        {
            $this->remember_token = $value;
        }

    public function getRememberTokenName()
        {
            return "remember_token";
        }

    public function getReminderEmail()
        {
            return $this->email;
        }


 public function setPasswordAttribute($value)
    {
        if ( ! empty ($value))
        {
            $this->attributes['password'] = Hash::make($value);
        }
    }
    
	public $errors;
    
    public function isValid($data)
    {
        $rules = array(
            'email'     => 'required|email|unique:users',
            'username' => 'required|min:4|max:40|unique:users',
            'password'  => 'required|min:8|confirmed',
            'nombre' => 'required|min:3|max:40',
            'apellido' => 'required|min:3|max:40',
            'telefono1' => 'required|min:11|max:12',
            'telefono2' => 'min:11|max:12',
            'informacion' => 'required|min:140|max:5000',
            'horario' => 'required|min:13|max:30',
            'direccion' => 'required|min:30|max:100'
        );
         // Si el usuario existe:
        if ($this->exists)
        {
            //Evitamos que la regla “unique” tome en cuenta el email del usuario actual
		$rules['email'] .= ',email,' . $this->id;
        }
        else // Si no existe...
        {
            // La clave es obligatoria:
            $rules['password'] .= '|required';
        }

        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }
    protected $fillable = array('email', 'username', 'password','nombre','apellido','telefono1','telefono2','informacion','horario','direccion','foto');
}
