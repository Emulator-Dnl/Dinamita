<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable=['usuario_id', 'user_id'];

    //Accessor
    protected $dates=['created_at', 'updated_at'];

    public function usuario(){
    	return $this->belongsTo(Usuario::class);
    }

    //user ahora es cliente
    /*public function cliente(){
    	return $this->belongsTo(Cliente::class);
    }*/

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function productos(){
    	return $this->belongsToMany(Producto::class);
    }
}
