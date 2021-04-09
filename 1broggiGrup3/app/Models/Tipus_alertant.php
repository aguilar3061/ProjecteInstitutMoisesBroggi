<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipus_alertant extends Model
{
    use HasFactory;

    protected $table='tipus_alertants';
    public $timestamps = false;

    public function alertants(){
        return $this->hasMany(Alertant::class, 'tipus_alertants_id');
    }
}
