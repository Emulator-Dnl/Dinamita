<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory;
    use SoftDeletes;

    //lo que se asigna a $table es el nombre que se dará a la tabla de éste modelo
    protected $table='usuarios';
    protected $fillable=['user_id', 'curp', 'sucursal_id', 'certificado', 'administrador'];

    public function facturas(){
    	return $this->hasMany(Factura::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }

    /*public function clientes(){
    	return $this->hasMany(Cliente::class);
    }*/
}
