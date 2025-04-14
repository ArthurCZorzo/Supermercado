<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Produto;

class Venda extends Model
{
    use HasFactory;

    function produtos () {
        return $this->belongsToMany(Produto::class)->withTimestamps("");
    }
}
