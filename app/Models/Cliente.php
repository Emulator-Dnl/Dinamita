<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable=['nombre', 'correo'];

    public function facturas(){
    	return $this->hasMany(Factura::class);
    }

    /*public function usuario(){
    	return $this->belongsTo(Usuario::class);
    }*/
}
