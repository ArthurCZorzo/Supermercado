<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentacaoEstoque extends Model
{
    protected $table = 'movimentacoes_estoque';
    protected $primaryKey = 'id_movimentacao';
}
