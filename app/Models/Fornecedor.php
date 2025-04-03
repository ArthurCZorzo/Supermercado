<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';

    function produtos(){
        return $this->hasMany(Produto::class);
    }
}
