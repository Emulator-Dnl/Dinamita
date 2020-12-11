<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsuariosController extends Controller
{
    public function __construct(){
        //Gate::authorize('admin'); //no sé porqué ésto no funciona, quizás sólo para middleware?
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=Usuario::get();//uso de modelo
        return view('usuarios/usuariosIndex', compact('usuarios'));
    }

    /**
     * Generate a random string, using a cryptographically secure 
     * pseudorandom number generator (random_int)
     *
     * This function uses type hints now (PHP 7+ only), but it was originally
     * written for PHP 5 as well.
     * 
     * For PHP 7, random_int is a PHP core function
     * For PHP 5.x, depends on https://github.com/paragonie/random_compat
     * 
     * @param int $length      How many characters do we want?
     * @param string $keyspace A string of all possible characters
     *                         to select from
     * @return string
     */
    
    /*public function random_str(int $length = 64, string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('admin');
        $sucursals=Sucursal::pluck('nombre', 'id');
        $clientes=User::invitado()->get(); //solo a los invitados
        return view('usuarios/usuariosForm', compact('clientes'), compact('sucursals'));
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
        //dd($request->all());
        //dd($request->nombre);

        //validar datos
        $request->validate([
            'user_id' => ['required', 'integer'],
            'curp' => ['bail', 'required', 'string', 'unique:usuarios', 'size:18', 'regex:/^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/i'],
            'sucursal_id' => ['required', 'integer'],
            'certificado' => ['required', 'string', 'max:150', 'active_url'],
        ]);
        
        //generar registro
        $length = 8;
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }                
        
        //guardar en db
        $usuario =new Usuario();
        $usuario->user_id=$request->user_id;
        //$usuario->user_id=\Auth::id();
        //$usuario->nombre=$request->nombre;
        //$usuario->apellido=$request->apellido;
        $usuario->curp=$request->curp;
        $usuario->sucursal_id=$request->sucursal_id;
        $usuario->certificado=$request->certificado;
        $usuario->registro=implode('', $pieces);
        //$usuario->correo=$request->correo;
        if($request->administrador=='1'){
            $usuario->administrador=true;
        }else{
            $usuario->administrador=false;
        }

        $usuario->save();

        //actualizo el campo 'tipo' de la tabla 'user' a 'usuario'
        User::where('id', $request->user_id)->update(['tipo' => 'usuario']);

        return redirect('usuarios')->with(['mensaje' => 'Usuario creado', 'alert-type' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        Gate::authorize('admin');
        //dd($usuario);
        return view('usuarios/usuarioShow', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        Gate::authorize('admin');
        $sucursals=Sucursal::pluck('nombre', 'id');
        return view('usuarios.usuariosForm', compact('usuario'), compact('sucursals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        Gate::authorize('admin');
        /*$usuario->nombre=$request->nombre;
        $usuario->registro=$request->registro;
        $usuario->correo=$request->correo;
        $usuario->save();
        return redirect()->route('usuario.show', [$usuario]);*/

        $request->validate([
            'curp' => ['bail', 'required', 'string', 'size:18', 'regex:/^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/i'],
            'sucursal_id' => ['required', 'integer'],
            'certificado' => ['required', 'string', 'max:150', 'active_url'],
        ]);

        //'nombre' => ['required', 'string', 'max:100', 'regex:/^[A-Za-zÁ-Úá-ú]+\s?[A-Za-zÁ-Úá-ú]+$/i'],
        //'apellido' => ['required', 'string', 'max:100', 'regex:/^[A-Za-zÁ-Úá-ú]+\s[A-Za-zÁ-Úá-ú]+$/i'],
        //'correo' => ['required', 'string', 'max:100', 'regex:/^.+@.+\..+$/i'],

        Usuario::where('id', $usuario->id)->update($request->except('_token', '_method'));
        return redirect()->route('usuarios.show', [$usuario])->with(['mensaje' => 'Usuario actualizado', 'alert-type' => 'alert-success']);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuar
     io  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        Gate::authorize('admin');
        $usuario->delete();
        return redirect()->route('usuarios.index')->with(['mensaje' => 'Usuario eliminado', 'alert-type' => 'alert-warning']);;
    }

    public function reprtePDF(){

        return 'pdf';
    }
}
