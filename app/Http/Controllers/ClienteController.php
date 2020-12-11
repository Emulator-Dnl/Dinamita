<?php

namespace App\Http\Controllers;

//use App\Models\Usuario;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //filtro los tipos 'usuario', 'admin' e 'invitado' mediante un scope
        $clientes=User::cliente()->get(); 
        //$clientes=User::where('tipo', 'cliente')->get(); //sin scope
        //$clientes=User::all();//CLIENTES FUE SUSTITUIDO POR USERS
        //$clientes=Clientes::all();  
        //$clientes=Cliente::with('usuario')->get();
        return view('clientes.clientesIndex', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //no sé encriptar la contraseña, so this goes away
        //return view('clientes.clientesForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //yo ya no registro clientes, aka users, eso lo hace jetstream
        /*$request->validate([
            'nombre' => 'required|string',
            'correo' => 'required|string',
        ]);*/

        //PUEDES GUARDAR EN users COMO SI NADA, pero no encripta la password... puedo hacerlo yo de la misma forma?
        /*$cliente =new User();
        $cliente->name=$request->nombre;
        $cliente->email=$request->correo;
        $cliente->password='password';
        $cliente->save();*/           
        
        //guardar en db
        /*$cliente =new Cliente();
        //$cliente->usuario_id=$request->usuario_id;
        $cliente->nombre=$request->nombre;
        $cliente->correo=$request->correo;
        $cliente->save();

        //Usuario::create($request->all());

        return redirect()->route('cliente.index');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
