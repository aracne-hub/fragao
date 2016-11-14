<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function lanches(){
        return $this->hasMany(Lanche::class);
    }
}
