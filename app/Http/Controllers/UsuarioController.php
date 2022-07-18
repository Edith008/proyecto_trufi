<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Carbon\carbon;
use PDF;
use Auth;
use App\Http\Controllers\BitacoraController;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate();

        return view('usuario.index', compact('usuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $usuarios->perPage());
    }

    public function pdf()
    {
        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->format('d-m-Y');
        
        // $buscarpor= $request->get('buscarpor');
        $usuarios = User::paginate();
        $pdf = PDF::loadView('usuario.pdf', compact('hora','fecha','usuarios'));
        return $pdf->download('_usuarios.pdf');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = new User();
        $roles = Role::pluck('nombre','id');

        return view('usuario.create', compact('usuario', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        //$usuario = User::create($request->all());

        $usuario = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            //
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
        ]);
        //CODIGO PARA LA BITACORA
        $detalle = "Registro de USUARIO: ".$request->name;
        app(BitacoraController::class)->registrar($detalle);
        //

        return redirect()->route('usuarios.index')
            ->with('success', 'Nuevo Usuario registrado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);

        return view('usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);

        $roles = Role::pluck('nombre','id');

        //CODIGO PARA LA BITACORA
        $detalle = "Se EDITÓ los datos de USUARIO: ".$usuario->name;
        app(BitacoraController::class)->registrar($detalle);
        //

        return view('usuario.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        request()->validate(User::$rules);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index')
            ->with('success', 'Datos del Usuario actualizados con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Se ELIMINO los datos de USUARIO: ".$usuario->name;
        app(BitacoraController::class)->registrar($detalle);
        //

        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Información del Usuarios eliminado con exito.');
    }
}
