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

    public function incidencies(){
        return $this->belongsToMany(Incidencia::class,'incidencias_has_afectats','afectats_id','incidencies_id');
    }

  
}
