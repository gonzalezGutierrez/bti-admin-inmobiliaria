<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatMunicipio extends Model
{
    use HasFactory;

    protected $table = 'municipios';
    protected $primaryKey =  'id';

    public function scopeGetwithIdEstado($query,$idEstado) {
        return $query->where('estado_id',$idEstado);
    }

    public function scopeJoinTblEstadoMunicipios($query) {
        return $query->join('estados_municipios','municipios.id','=','estados_municipios.municipios_id');
    }


}
