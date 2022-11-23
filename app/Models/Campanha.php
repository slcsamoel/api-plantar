<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    use HasFactory;

    protected $fillable = ['grupo_id' , 'nome' , 'descricao', 'desconto','status'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function campanhaProdutos()
    {
        return $this->belongsToMany(Produto::class , 'campanha_produtos' , 'campanha_id' , 'produto_id')->withTimestamps()->withPivot('preco');
    }

}
