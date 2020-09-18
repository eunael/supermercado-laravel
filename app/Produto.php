<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'estoque',
    ];

    public $timestamps = false;

    public function setProdutoAttribute($value){
        $this->attributes['produto'] = $value;
    }
}
