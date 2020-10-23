<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatRol extends Model
{
    use HasFactory;

    protected $table = 'cat_roles';
    protected $primaryKey = 'idRol';

    public function scopeGetRolesSelect($query)
    {
        return $query->getNotDeleted()->orderBy('idRol','ASC')->pluck('rol','idRol');
    }
    public function scopeGetNotDeleted($query)
    {
        return $query->where('eliminado',0);
    }
}
