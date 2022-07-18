<?php

namespace App\Http\Controllers;

use App\Models\Multa;
use App\Models\Socio;
use Illuminate\Http\Request;

use Carbon\carbon;
use PDF;
use Auth;
use App\Http\Controllers\BitacoraController;

/**
 * Class MultaController
 * @package App\Http\Controllers
 */
class MultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $multas = Multa::paginate();

        return view('multa.index', compact('multas'))
            ->with('i', (request()->input('page', 1) - 1) * $multas->perPage());
    }


    public function pdf()
    {
        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->format('d-m-Y');

        $multas = Multa::paginate();
        $pdf = PDF::loadView('multa.pdf',['multas'=>$multas], compact('hora','fecha','multas'));
        return $pdf->download('_multas.pdf');  
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $multa = new Multa();
        $socios = Socio::pluck('nombre','id');

        return view('multa.create', compact('multa','socios'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Multa::$rules);

        $multa = Multa::create($request->all());

        //CODIGO PARA LA BITACORA
        $detalle = "Registro de MULTA para: ".$multa->socios->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return redirect()->route('multas.index')
            ->with('success', 'Nueva Multa registrada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $multa = Multa::find($id);

        return view('multa.show', compact('multa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $multa = Multa::find($id);
        $socios = Socio::pluck('nombre','id');

        //CODIGO PARA LA BITACORA
        $detalle = "Se EDITÓ los datos de la MULTA de: ".$multa->socios->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //
        
        return view('multa.edit', compact('multa','socios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Multa $multa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Multa $multa)
    {
        request()->validate(Multa::$rules);

        $multa->update($request->all());

        return redirect()->route('multas.index')
            ->with('success', 'Datos de la Multa actualizados con exito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $multa = Multa::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Se ELIMINÓ los datos de la MULTA de: ".$multa->socios->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        $multa->delete();

        return redirect()->route('multas.index')
            ->with('success', 'Multa eliminada.');
    }
}
