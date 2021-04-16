<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    protected $table='incidencies';
    public $timestamps = false;


    public function afectats(){
        return $this->belongsToMany(Afectat::class,'incidencias_has_afectats','incidencies_id','afectats_id');
    }

    public function tipus_incidencia(){
        return $this->belongsTo(Tipus_Incidencia::class,'tipus_incidencies_id');
    }

    // public function recursos(){
    //     return $this->belongsToMany(Recurs::class,'incidencias_has_recursos','incidencies_id','recursos_id')->withPivot('hora_activacio','hora_mobilitzacio','hora_assistencia','hora_Transport','hora_arribada_hospital','hora_transferencia','hora_finalitzacio','prioritat','desti');
    // }

    public function incidencia_has_recursos(){
        return $this->hasMany(IncidenciaHasRecurso::class, 'incidencies_id');
    }

    public function usuari(){
        return $this->belongsTo(Usuari::class,'usuaris_id');
    }

    public function alertant(){
        return $this->belongsTo(Alertant::class,'alertants_id');
    }

    public function municipi(){
        return $this->belongsTo(Municipi::class,'municipis_id');
    }
}
