<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation\HasMany;
use App\Models\Produto;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';

    function produtos (){
        return $this->hasMany(Produto::class);
    }
}
