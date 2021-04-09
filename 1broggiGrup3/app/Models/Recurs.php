<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurs extends Model
{
    use HasFactory;

    protected $table='recursos';
    public $timestamps = false;

    public function incidencies(){
        return $this->belongsToMany(Incidencia::class,'incidencias_has_recursos','recursos_id','incidencies_id')->withPivot('hora_activacio','hora_mobilitzacio','hora_assistencia','hora_Transport','hora_arribada_hospital','hora_transferencia','hora_finalitzacio','prioritat','desti');
    }

    public function tipus_recurs(){
        return $this->belongsTo(Tipus_recurs::class,'tipus_recursos_id');
    }

    public function usuaris(){
        return $this->hasMany(Usuari::class, 'recursos_id');
    }
}
