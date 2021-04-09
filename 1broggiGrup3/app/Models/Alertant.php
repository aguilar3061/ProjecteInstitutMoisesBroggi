<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alertant extends Model
{
    use HasFactory;

    protected $table='alertants';
    public $timestamps = false;

    public function incidencies(){
        return $this->hasMany(Incidencia::class, 'alertants_id');
    }

    public function tipus_alertant(){
        return $this->belongsTo(Tipus_alertant::class, 'tipus_alertants_id');
    }

    //esta hay que revisar la relación ya que es una 0..1 -> 1..*
    public function municipi(){
        return $this->belongsTo(Municipi::class, 'municipis_id');
    }
}
