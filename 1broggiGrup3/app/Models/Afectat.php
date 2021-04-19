<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afectat extends Model
{
    use HasFactory;

    protected $table='afectats';
    public $timestamps = false;

    public function sexe(){
        return $this->belongsTo(Sexe::class,'sexes_id');
    }

    // public function incidencies(){
    //     return $this->belongsToMany(Incidencia::class,'incidencies_has_afectats','afectats_id','incidencies_id');
    // }
    public function incidencies_has_afectats(){
        return $this->hasMany(IncidenciaHasAfectats::class, 'afectats_id');
    }
}
