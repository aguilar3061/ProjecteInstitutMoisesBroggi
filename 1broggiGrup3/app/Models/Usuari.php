<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuari extends Model
{
    use HasFactory;

    protected $table='usuaris';
    public $timestamps = false;

    public function incidencies(){
        return $this->hasMany(Incidencia::class, 'usuaris_id');
    }


    public function recurs(){
        return $this->belongsTo(Recurs::class,'recursos_id');
    }

    public function rol(){
        return $this->belongsTo(Rol::class,'rols_id');
    }


}
