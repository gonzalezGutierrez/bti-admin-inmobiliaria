<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatEmpresa extends Model
{
    use HasFactory;

    protected $table = 'cat_empresas';
    protected $primaryKey = 'idEmpresa';
}
