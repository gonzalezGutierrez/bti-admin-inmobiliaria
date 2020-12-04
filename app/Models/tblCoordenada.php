<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblCoordenada extends Model
{
    use HasFactory;

    protected $table = 'tbl_coordenadas';
    protected $primaryKey = 'idCoordenada';

    public function scopeGetCoordenadas($query,$idFraccionamiento) {

        return $query->where('idFraccionamiento',$idFraccionamiento)
            ->select('latitud as lat','longitud as lng');

    }


}
