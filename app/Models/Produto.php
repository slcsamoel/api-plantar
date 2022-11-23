<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome' , 'descricao' , 'preco'];

    public function produtoCampanhas()
    {
        return $this->belongsToMany(Campanha::class , 'campanha_produtos' , 'produto_id' ,'campanha_id' )->withTimestamps()->withPivot('preco');
    }

}
