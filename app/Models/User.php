<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{

    protected $table = 'tbl_usuarios';
    protected $primaryKey = 'idUsuario';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
        'nombreUsuario',
        'celular'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    //metodos de la clase
    public function add($user)
    {
        return User::create($user);
    }

    public function edit($user)
    {
        $this->fill($user)->save();
    }

    public function patchItem($attribute,$value)
    {
        return $this->fill([$attribute=>$value])->save();
    }


}
