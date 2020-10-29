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

    public function setPasswordAttribute($password) {

        $this->attributes['password'] = bcrypt($password);

    }

    //metodos de la clase
    public function add($user) {

        return User::create($user);

    }

    public function edit($user) {

        $this->fill($user)->save();

    }

    public function patchItem($attribute,$value) {

        return $this->fill([$attribute=>$value])->save();

    }

    public function scopeGetUsers( $query ) {

        return $query->tblRol()
            ->orderBy('idUsuario','DESC')
            ->getAttributes();

    }

    public function scopeTblRol($query) {

        return $query->join('cat_roles','tbl_usuarios.idRol','cat_roles.idRol');

    }

    public function scopeGetAttributes($query) {

        return $query->select(
            'tbl_usuarios.idUsuario',
            'tbl_usuarios.nombre',
            'tbl_usuarios.apellido',
            'tbl_usuarios.celular',
            'tbl_usuarios.email',
            'tbl_usuarios.eliminado',
            'cat_roles.rol'
        );

    }


    public static function findByUserName($userName) {
        return User::where('nombreUsuario',$userName)->first();
    }


}
