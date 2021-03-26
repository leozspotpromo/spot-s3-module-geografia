<?php

namespace Modules\Geografia\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $table = 'state';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    
    protected static function newFactory()
    {
        return \Modules\Geografia\Database\factories\EstadoFactory::new();
    }
    
    // public function cidades()
    // {
    //     return $this->hasMany(Cidade::class, 'state_id', 'id');
    // }
}
