<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'email', 'password', 'password_confirmation', 'status', 'role'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function hasAnyRoles($roles)
    {
        return null !== $this->roles()->whereIn('name',$roles)->first(); //whereIn is used to fetch an array.
    }

    public function hasAnyRole($role)
    {
        return null !== $this->roles()->where('name',$role)->first();
    }
    
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
