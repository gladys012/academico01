<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //tabla pesonas
    protected $table ="identificador";

    //protected $fillable =['id','nombre','materno','paterno','ci','direccion','telefono','email','estado'];
    
    public function recepcion(){
        return $this->hasOne('App\Notas_Materia');
    }
    public function user(){
        return $this->hasOne('App\User');
    }
}
