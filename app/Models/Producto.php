<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Producto extends Model
{
    use HasFactory;
	use SoftDeletes;

    protected $fillable=[
    	'nombre', 'existencias', 'precio'];

    public function facturas(){
    	return $this->belongsToMany(Factura::class);
    }

    //Mutator (no me gustan tanto porque hacen que se pierda info)
    public function setNombreAttribute($value){        
        //$this->attributes['Nombre'] = ucfirst(strtolower($value));
        $this->attributes['Nombre'] = Str::ucfirst(Str::lower($value)); //equivalente con helpers

    }

    //Accessor
    /*public function getNombreAttribute($value){
        return ucfirst(strtolower($value));
    }*/

    //Accessor columna virtual
    public function getPrecioPorExistenciasAttribute($value){
        $cad=strval( $this->precio*$this->existencias );
        $nf=number_format($cad);
        return $nf.' MXN';
    }


    /*
	//Accessor
    public function getPrecioAttribute($value){
    	return $value . ' MXN';
    }
	
	//Mutator
	public function setPrecioAttribute($value){
    	$this->attributes['Precio'] = $value . ' MXN';
    }*/
    
}
