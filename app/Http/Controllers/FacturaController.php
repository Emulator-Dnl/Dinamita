<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
//use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //precarga de la información, con los eliminados (Eager loading)
        $facturas=Factura::with(['usuario' => function($q) {
            $q->withTrashed();
        }])->with(['productos' => function($q) {
            $q->withTrashed();
        }])
        ->get();
        return view('facturas.facturasIndex', compact('facturas'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //no creo que haya gran problema si en el view usas una instancia de user y lo relacionas con otra de user
        //que le envías aquí, siempre y cuando al GUARDAR hagas la relación entre usuario y user

        $empleados=DB::table('usuarios')->select('id', 'user_id')->get();
        $invitados=DB::table('users')->select('id', 'name')->where('tipo', 'invitado')->orWhere('tipo', 'cliente')->get();
        $productos=Producto::all();
        //return view('facturas.facturasForm', compact('usuarios'), compact('clientes'), compact('productos'));
        return view('facturas.facturasForm')->with(compact('invitados'))->with(compact('productos'))->with(compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$factura =new Factura();
        $factura->usuario_id=$request->usuario_id;
        $factura->cliente_id=$request->cliente_id;
        $factura->save();

        return redirect()->route('factura.index');*/

        $factura=Factura::create($request->all());
        $factura->productos()->attach($request->producto_id);

        //El invitado se convierte en cliente al hacer una compra
        User::where('id', $request->user_id)->update(['tipo' => 'cliente']);

        return redirect()->route('factura.index')->with(['mensaje' => 'Factura creada', 'alert-type' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        /*$facturawta=Factura::with(['usuario' => function($q) {
            $q->withTrashed();
        }])->with(['productos' => function($q) {
            $q->withTrashed();
        }])
        ->get();
        
        $facturar
        foreach($facturawta as $f => $value) {
            if($factura->id==$f->id){
                $facturar=$f;
            }
        }
        dd($facturar);*/
        return view('facturas/facturasShow', compact('factura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
