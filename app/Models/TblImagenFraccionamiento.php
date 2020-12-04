<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblImagenFraccionamiento extends Model
{
    use HasFactory;

    protected $table = 'tbl_imagen_fraccionamientos';
    protected $primaryKey = 'idImagenFraccionamiento';

    public function scopeGetImagesByIdFraccionamiento($query,$idFraccionamiento) {
        return $query->where('idFraccionamiento',$idFraccionamiento)
            ->where('eliminado',0);
    }
}
