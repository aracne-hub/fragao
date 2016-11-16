<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function lanches(){
        return $this->hasMany(Lanche::class);
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($categoria) { // before delete() method call this
            $categoria->lanches()->delete();
        });
    }
}
