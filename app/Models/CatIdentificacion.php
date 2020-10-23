<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatIdentificacion extends Model
{
    use HasFactory;

    protected $table = 'cat_identificaciones';
    protected $primaryKey = 'idIdentificacion';

    public function scopeGetIdentificacionesSelect($query)
    {

        return $query->getNotDeleted()
            ->orderBy('idIdentificacion','DESC')
            ->pluck('identificacion','idIdentificacion');

    }

    public function scopeGetNotDeleted($query)
    {
        return $query->where('eliminado',0);
    }
}
