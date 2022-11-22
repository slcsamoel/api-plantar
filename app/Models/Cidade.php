<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'grupo_id','descricao'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }


}
