<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatCliente extends Model
{
    use HasFactory;
    protected $table = 'tbl_clientes';
    protected $primaryKey = 'idCliente';

    public function scopeGetClientes($query,$request) {
        return $query->orderBy('idCliente','DESC')->filter($request)->getAttributes();
    }
    public function scopeTblIndentificaciones($query) {
        return $query->join('cat_identificaciones','tbl_clientes.idIdentificacion','cat_identificaciones.idIdentificacion');
    }
    public function scopeFilter($query,$request){
        return $query->filterLike($request->q_like)
            ->filterWithStatus($request->estatus)
            ->filterWithType($request->tipoCliente);
    }
    public function scopeFilterLike($query,$like){
        return $query->filterWithName($like)
            ->filterWithLastName($like)
            ->filterWithCURP($like);
    }
    public function scopeFilterWithName($query,$like) {
        return $query->when(!empty($like),function ($query) use($like) {
           return $query->where('tbl_clientes.nombre','LIKE',"%{$like}%");
        });
    }
    public function scopeFilterWithLastName($query,$like) {
        return $query->when(!empty($like), function ($query) use($like){
            return $query->orWhere('tbl_clientes.apellidoPaterno',"LIKE","%{$like}%");
        });
    }
    public function scopeFilterWithCURP($query,$like) {
        return $query->when(!empty($like),function ($query) use($like) {
            $query->orWhere('tbl_clientes.curp','LIKE',"%{$like}%");
        });
    }
    public function scopeFilterWithStatus($query,$status) {
        return $query->when(!empty($status), function ($query) use($status) {
            return $query->where('tbl_clientes.eliminado',$status);
        });
    }
    public function scopeFilterWithType($query,$type) {
        return $query->when(!empty($type), function ($query) use($type) {
            return $query->where('tbl_clientes.tipoCliente',$type);
        });
    }
    public function scopeGetAttributes($query)
    {
        return $query->select(
            'tbl_clientes.idCliente',
            'tbl_clientes.nombre',
            'tbl_clientes.apellidoPaterno',
            'tbl_clientes.apellidoMaterno',
            'tbl_clientes.email',
            'tbl_clientes.celular',
            'tbl_clientes.eliminado',
            'tbl_clientes.tipoCliente'
        );
    }
}
