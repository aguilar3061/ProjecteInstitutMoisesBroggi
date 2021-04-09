<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table='rols';
    public $timestamps = false;

    public function usuaris(){
        return $this->hasMany(Usuari::class, 'rols_id');
    }
}
