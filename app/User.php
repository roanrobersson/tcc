<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'usuario';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comandas()
    {
       return $this->hasMany('App\Comanda');
    }

    public function grupo()
    {
       return $this->belongsTo('App\Grupo');
    }

    public function isAdmin()
    {
      if ($this->grupo_id == 1)
      {
        return true;
      }
    }
}
