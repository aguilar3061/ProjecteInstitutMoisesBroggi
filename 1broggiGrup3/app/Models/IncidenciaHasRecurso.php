<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidenciaHasRecurso extends Model
{
    use HasFactory;

    protected $table='incidencies_has_recursos';
    protected $primaryKey = ['incidencies_id','recursos_id'];
    public $timestamps = false;

    public $incrementing = false;


    public function incidencia(){
        return $this->belongsTo(Incidencia::class,'incidencies_id');
    }

    public function recurs(){
        return $this->belongsTo(Recurs::class,'recursos_id');
    }


}
