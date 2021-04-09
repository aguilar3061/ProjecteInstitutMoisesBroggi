<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipi extends Model
{
    use HasFactory;

    protected $table='municipis';
    public $timestamps = false;

    public function incidencies(){
        return $this->hasMany(Incidencia::class, 'municipis_id');
    }

    //Revisar relacion con la clase
    public function alertants(){
        return $this->hasMany(Alertant::class, 'municipis_id');
    }

    public function comarca(){
        return $this->belongsTo(Comarca::class, 'comarques_id');
    }
}
