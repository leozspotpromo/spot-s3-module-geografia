<?php

namespace Modules\Geografia\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $table = 'city';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Geografia\Database\factories\CidadeFactory::new();
    }
}
