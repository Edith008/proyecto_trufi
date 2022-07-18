<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Socio;
use Illuminate\Http\Request;

use Carbon\carbon;
use PDF;
use Auth;
use App\Http\Controllers\BitacoraController;

/**
 * Class VehiculoController
 * @package App\Http\Controllers
 */
class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::paginate();

        return view('vehiculo.index', compact('vehiculos'))
            ->with('i', (request()->input('page', 1) - 1) * $vehiculos->perPage());
    }

    public function pdf()
    {
        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->format('d-m-Y');

        $vehiculos = Vehiculo::paginate();
        $pdf = PDF::loadView('vehiculo.pdf',['vehiculos'=>$vehiculos], compact('hora','fecha','vehiculos'));
        return $pdf->download('_vehiculos.pdf');  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculo = new Vehiculo();
        $socios = Socio::pluck('nombre','id');

        return view('vehiculo.create', compact('vehiculo','socios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Vehiculo::$rules);

        $vehiculo = Vehiculo::create($request->all());

        //CODIGO PARA LA BITACORA
        $detalle = "Registro de VEHÍCULO del socio: ".$vehiculo->socio->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehiculo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);

        return view('vehiculo.show', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo = Vehiculo::find($id);
        $socios = Socio::pluck('nombre','id');

        //CODIGO PARA LA BITACORA
        $detalle = "Se EDITÓ los datos del VEHÍCULO del socio: ".$vehiculo->socio->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        return view('vehiculo.edit', compact('vehiculo','socios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Vehiculo $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        request()->validate(Vehiculo::$rules);

        $vehiculo->update($request->all());

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehiculo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);

        //CODIGO PARA LA BITACORA
        $detalle = "Se ELIMINÓ los datos del VEHÍCULO del socio: ".$vehiculo->socio->nombre;
        app(BitacoraController::class)->registrar($detalle);
        //

        $vehiculo->delete();

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehiculo deleted successfully');
    }
}
