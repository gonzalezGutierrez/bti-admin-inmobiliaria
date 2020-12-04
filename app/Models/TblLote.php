<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblLote extends Model
{
    use HasFactory;

    protected $table = 'tbl_lotes';
    protected $primaryKey = 'idLote';

    public function scopeGetLotesByIdFraccionamiento($query,$idFraccionamiento) {
        return $query->where('idFraccionamiento',$idFraccionamiento)
            ->where('eliminado',0);
    }
}
