<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use Carbon\carbon;
use PDF;
use Auth;

/**
 * Class BitacoraController
 * @package App\Http\Controllers
 */
class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->toDateString();

        $buscarpor= $request->get('buscarpor');
        
        $bitacoras = Bitacora::where('fecha','like','%'.$buscarpor)->paginate();
            
        return view('bitacora.index', compact('bitacoras','buscarpor'))
            ->with('i', (request()->input('page', 1) - 1) * $bitacoras->perPage());
        
    }
    
    public function pdf(Request $request)
    {
        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->toDateString();
        
        $buscarpor= $request->get('buscarpor');
        
        $bitacoras = Bitacora::where('fecha','like','%'.$buscarpor)->paginate();

        $pdf = PDF::loadView('bitacora.pdf',['bitacoras'=>$bitacoras], compact('hora','fecha','bitacoras'));
        return $pdf->download('_bitacoras.pdf');
        // return view('bitacora.pdf',['bitacoras'=>$bitacoras], compact('bitacoras','fecha','hora'));

    }

    public function registrar(String $detalle)
    {
        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->toDateString();

        $bitacora = new Bitacora();
        $bitacora->detalle = $detalle;
        $bitacora->hora = $hora;
        $bitacora->fecha = $fecha;
        $bitacora->user_id = Auth::user()->id;
        $bitacora->save();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bitacora = new Bitacora();
        return view('bitacora.create', compact('bitacora'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Bitacora::$rules);

        $bitacora = Bitacora::create($request->all());

        return redirect()->route('bitacoras.index')
            ->with('success', 'Bitacora created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bitacora = Bitacora::find($id);

        return view('bitacora.show', compact('bitacora'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bitacora = Bitacora::find($id);

        return view('bitacora.edit', compact('bitacora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bitacora $bitacora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bitacora $bitacora)
    {
        request()->validate(Bitacora::$rules);

        $bitacora->update($request->all());

        return redirect()->route('bitacoras.index')
            ->with('success', 'Bitacora updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bitacora = Bitacora::find($id)->delete();

        return redirect()->route('bitacoras.index')
            ->with('success', 'Bitacora deleted successfully');
    }
}
