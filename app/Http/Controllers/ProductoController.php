<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto::all();//uso de modelo
        return view('productos/productosIndex', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('admin');
        return view('productos.productosForm');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('admin');
        //validar datos
        $request->validate([
            'nombre' => 'required|string',
            'existencias' => 'required|integer|gt:-1',
            'precio' => 'required|numeric|gt:1',
        ]);

        //guardar en db
        $producto =new Producto();
        $producto->nombre=$request->nombre;
        $producto->existencias=$request->existencias;
        $producto->precio=$request->precio;
        if($request->receta=='1'){
            $producto->receta=true;
        }else{
            $producto->receta=false;
        }
        $producto->save();

        //return redirect('productos');
        return redirect()->route('producto.index')->with(['mensaje' => 'Producto creado', 'alert-type' => 'alert-success']);;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        Gate::authorize('admin');
        return view('productos/productosShow', compact('producto'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        Gate::authorize('admin');
        return view('productos.productosForm', compact('producto'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        Gate::authorize('admin');
        //validar datos
        $request->validate([
            'nombre' => 'required|string',
            'existencias' => 'required|integer|gt:-1',
            'precio' => 'required|numeric|gt:1',
        ]);

        Producto::where('id', $producto->id)->update($request->except('_token', '_method'));
        return redirect()->route('producto.show', [$producto])->with(['mensaje' => 'Producto actualizado', 'alert-type' => 'alert-success']);;    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        Gate::authorize('admin');
        $producto->delete();
        return redirect()->route('producto.index')->with(['mensaje' => 'Producto eliminado', 'alert-type' => 'alert-warning']);;
    }
}
