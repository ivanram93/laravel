<?php

namespace Cinema;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
/*Incluimos SoftDeletes para ocultar elementos en lugar de eliminarlos directamente de la base de datos, pues es importante mantener el registro de los mismos.*/
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /*Para agregar columnas a una tabla que ya tiene registros, nos vamos a la consola y tenemos que hacer una migración con la estructura siguiente: 'php artisan make:migration add_deleted_to_users_table --table=users' en donde le indicamos que agregaremos la columna 'deleted_at' en la tabla usuarios (--table=users)*/
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function setPasswordAttribute($valor) {
        if(!empty($valor)) {
             $this->attributes["password"] = \Hash::make($valor);
        }
    }
}
