<?php

namespace App\Http\Controllers;

use App\Models\Chofere;
use Illuminate\Http\Request;

use Carbon\carbon;
use PDF;
use Auth;
use App\Http\Controllers\BitacoraController;

/**
 * Class ChofereController
 * @package App\Http\Controllers
 */
class ChofereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarpor= $request->get('buscarpor');
        $choferes = Chofere::where('nombre','like','%'.$buscarpor.'%')
                             ->orWhere('ci','like','%'.$buscarpor.'%')->paginate();
        return view('chofere.index', compact('choferes','buscarpor'))
            ->with('i', (request()->input('page', 1) - 1) * $choferes->perPage());
    }

    public function pdf()
    {
        $choferes = Chofere::paginate();
        
        $pdf = PDF::loadView('chofere.pdf',['choferes'=>$choferes]);
        //$pdf->loadHTML('<h1> test </h1>');
        //return $pdf->stream();
        
        return $pdf->download('_choferes.pdf');

        //return view('chofere.pdf', compact('choferes'));   
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chofere = new Chofere();
        return view('chofere.create', compact('chofere'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Chofere::$rules);

        $chofere = Chofere::create($request->all());

        //CODIGO PARA LA BITACORA
        $detalle = "Registro de CHOFER: ".$request->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return redirect()->route('choferes.index')
            ->with('success', 'Nuevo Chofer registrado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chofere = Chofere::find($id);

        return view('chofere.show', compact('chofere'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chofere = Chofere::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Se EDITÓ los datos de CHOFER: ".$chofere->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return view('chofere.edit', compact('chofere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Chofere $chofere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chofere $chofere)
    {
        request()->validate(Chofere::$rules);

        $chofere->update($request->all());

        return redirect()->route('choferes.index')
            ->with('success', 'Datos del Chofer actualizados con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $chofere = Chofere::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Se ELIMINÓ los datos de CHOFER: ".$chofer->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        $chofere->delete();

        return redirect()->route('choferes.index')
            ->with('success', 'Información del Chofer eliminado con exito.');
    }
}
