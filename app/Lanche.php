<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lanche extends Model
{
    public function getPrecoAttribute($value){
        return number_format($value, 2, ',', '');
    }

    public function card(){
        $this->belongsTo(Categoria::class);
    }
}
