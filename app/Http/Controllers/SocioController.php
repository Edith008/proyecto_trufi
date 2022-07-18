<?php

namespace App\Http\Controllers;

use App\Models\Socio;
use Illuminate\Http\Request;
use Carbon\carbon;
use PDF;
use Auth;
use App\Http\Controllers\BitacoraController;

/**
 * Class SocioController
 * @package App\Http\Controllers
 */
class SocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarpor= $request->get('buscarpor');

        $socios = Socio::where('nombre','like','%'.$buscarpor.'%')
                         ->orWhere('ci','like','%'.$buscarpor.'%')->paginate();
        return view('socio.index', compact('socios','buscarpor'))
            ->with('i', (request()->input('page', 1) - 1) * $socios->perPage());
    }

    public function pdf(Request $request)
    {
        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->format('d-m-Y');
        
        $buscarpor= $request->get('buscarpor');
        $socios = Socio::where('nombre','like','%'.$buscarpor.'%')
                         ->orWhere('ci','like','%'.$buscarpor.'%')->paginate();
        
        $pdf = PDF::loadView('socio.pdf',['socios'=>$socios], compact('hora','fecha','socios'));
        return $pdf->download('_socios.pdf');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socio = new Socio();
        return view('socio.create', compact('socio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Socio::$rules);

        $socio = Socio::create($request->all());

        //CODIGO PARA LA BITACORA
        $detalle = "Registro de SOCIO: ".$request->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //
        return redirect()->route('socios.index')
            ->with('success', 'Socio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $socio = Socio::find($id);

        return view('socio.show', compact('socio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socio = Socio::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Se EDITO los datos de SOCIO: ".$socio->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return view('socio.edit', compact('socio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Socio $socio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Socio $socio)
    {
        request()->validate(Socio::$rules);

        $socio->update($request->all());

        return redirect()->route('socios.index')
            ->with('success', 'Socio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $socio = Socio::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Se ELIMINO los datos de SOCIO: ".$socio->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        $socio->delete();

        return redirect()->route('socios.index')
            ->with('success', 'Socio deleted successfully');
    }
}
