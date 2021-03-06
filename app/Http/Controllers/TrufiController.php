<?php

namespace App\Http\Controllers;

use App\Models\Trufi;
use App\Models\Chofere;
use App\Models\Vehiculo;
use App\Models\Gruporuta;
use Illuminate\Http\Request;

use Carbon\carbon;
use PDF;
use Auth;
use App\Http\Controllers\BitacoraController;

/**
 * Class TrufiController
 * @package App\Http\Controllers
 */
class TrufiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trufis = Trufi::paginate();

        return view('trufi.index', compact('trufis'))
            ->with('i', (request()->input('page', 1) - 1) * $trufis->perPage());
    }

    public function pdf()
    {
        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->format('d-m-Y');

        $trufis = Trufi::paginate();
        $pdf = PDF::loadView('trufi.pdf',['trufis'=>$trufis], compact('hora','fecha','trufis'));
        return $pdf->download('_trufis.pdf');  
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trufi = new Trufi();
        $choferes = Chofere::pluck('nombre','id');
        $vehiculos = Vehiculo::pluck('matricula','id');
        $gruporutas = Gruporuta::pluck('nombre','id');

        return view('trufi.create', compact('trufi','choferes','vehiculos','gruporutas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Trufi::$rules);

        $trufi = Trufi::create($request->all());

        //CODIGO PARA LA BITACORA
        $detalle = "Registro de TRUFI del INTERNO ".$trufi->id;
        app(BitacoraController::class)->registrar($detalle);
        //

        return redirect()->route('trufis.index')
            ->with('success', 'Trufi created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trufi = Trufi::find($id);

        return view('trufi.show', compact('trufi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trufi = Trufi::find($id);
        $choferes = Chofere::pluck('nombre','id');
        $vehiculos = Vehiculo::pluck('matricula','id');
        $gruporutas = Gruporuta::pluck('nombre','id');

        //CODIGO PARA LA BITACORA
        $detalle = "Se EDIT?? los datos del TRUFI del INTERNO ".$trufi->id;
        app(BitacoraController::class)->registrar($detalle);
        //

        return view('trufi.edit', compact('trufi','choferes','vehiculos','gruporutas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Trufi $trufi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trufi $trufi)
    {
        request()->validate(Trufi::$rules);

        $trufi->update($request->all());

        return redirect()->route('trufis.index')
            ->with('success', 'Trufi updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $trufi = Trufi::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Se ELIMIN?? los datos del TRUFI del INTERNO ".$trufi->id;
        app(BitacoraController::class)->registrar($detalle);
        //

        $trufi->delete();

        return redirect()->route('trufis.index')
            ->with('success', 'Trufi deleted successfully');
    }
}
