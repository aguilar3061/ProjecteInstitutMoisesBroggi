<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipus_Incidencia extends Model
{
    use HasFactory;

    protected $table='tipus_incidencies';
    public $timestamps = false;


    public function incidencies(){
        return $this->hasMany(Incidencia::class, 'tipus_incidencies_id');
    }
}
