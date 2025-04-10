<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Fornecedor;
use App\Models\Venda;

class Produto extends Model
{
    use HasFactory;

    function fornecedor(){
        return $this->belongsTo(Fornecedor::class);
    }

    function vendas(){
        return $this->hasMany(Venda::class);
    }
}
