<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampanhaProduto extends Model
{
    use HasFactory;

    protected $fillable = [ 'campanha_id' , 'produto_id' , 'preco'];

    public function campanha()
    {
        return $this->belongsTo(Campanha::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }


}
