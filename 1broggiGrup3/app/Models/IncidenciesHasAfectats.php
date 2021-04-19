<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidenciesHasAfectats extends Model
{
    
    use HasFactory;

    protected $table='incidencies_has_afectats';
    protected $primaryKey = ['incidencies_id','afectats_id'];
    public $timestamps = false;

    public $incrementing = false;


    public function incidencia(){
        return $this->belongsTo(Incidencia::class,'incidencies_id');
    }

    public function afectat(){
        return $this->belongsTo(Afectats::class,'afectats_id');
    }


}
