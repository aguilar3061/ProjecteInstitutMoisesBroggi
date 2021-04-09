<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipus_recurs extends Model
{
    use HasFactory;

    protected $table='tipus_recursos';
    public $timestamps = false;

    public function recursos(){
        return $this->hasMany(Recurs::class, 'tipus_recursos_id');
    }
}
