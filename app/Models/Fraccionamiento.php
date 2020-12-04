<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fraccionamiento extends Model
{
    use HasFactory;

    protected $table = 'cat_fraccionamientos';
    protected $primaryKey = 'idFraccionamiento';

    public function scopeFraccionamientos($query,$like) {
        return $query->tblEmpresa()
            ->tblMunicipio()
            ->attributes()
            ->getLike($like)
            ->orderBy('cat_fraccionamientos.created_at','desc');
    }

    public function scopeTblEmpresa($query) {
        return $query->join('cat_empresas','cat_fraccionamientos.idEmpresa','cat_empresas.idEmpresa');
    }
    public function scopeTblMunicipio($query) {
        return $query->join('municipios','cat_fraccionamientos.idMunicipio','municipios.id')
            ->tblEstados();
    }
    public function scopeTblEstados($query) {
        return $query->join('estados','municipios.estado_id','estados.id');
    }
    public function scopeGetLike($query,$like) {
        return $query->where('cat_fraccionamientos.fraccionamiento','LIKE',"%{$like}%")
            ->orWhere('cat_empresas.empresa','LIKE',"%{$like}%")
            ->orWhere('municipios.nombre','LIKE',"%{$like}%")
            ->orWhere('estados.nombre','LIKE',"%{$like}%");
    }
    public function scopeAttributes($query) {
        return $query->select(
            'cat_fraccionamientos.idFraccionamiento',
            'cat_fraccionamientos.fraccionamiento',
            'cat_fraccionamientos.direccion',
            'cat_fraccionamientos.descripcion',
            'cat_empresas.empresa',
            'municipios.nombre as municipio',
            'estados.nombre as estado'
        );
    }



}
