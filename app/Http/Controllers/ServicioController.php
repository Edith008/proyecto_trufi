<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Trufi;
use Illuminate\Http\Request;
use Carbon\carbon;
use PDF;
use Auth;

/**
 * Class ServicioController
 * @package App\Http\Controllers
 */
class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // protected $dti;
    // protected $dtf;

    public function index(Request $request)
    {
        $buscarpor= $request->get('buscarpor');
        $servicios = Servicio::where('trufi_id','like','%'.$buscarpor.'%')
                              ->orWhere('fecha','=',$buscarpor)->paginate();

        $trufis = Trufi::pluck('id');

        return view('servicio.index', compact('servicios','buscarpor','trufis'))
            ->with('i', (request()->input('page', 1) - 1) * $servicios->perPage());
    }

    public function pdf(Request $request)
    {
        $TiempoActual = Carbon::now();
        $hora = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->format('d-m-Y');
        
        $servicios = Servicio::paginate();
        $pdf = PDF::loadView('servicio.pdf',['servicios'=>$servicios], compact('hora','fecha','servicios'));
        return $pdf->download('_Reporte de Servicios.pdf');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicio = new Servicio();
        $trufis = Trufi::pluck('id','id');

        $TiempoActual = Carbon::now();
        $salida = $TiempoActual->toTimeString();
        $fecha = $TiempoActual->toDateString();
        //$llegada = '00:00:00';

        //echo $dt->toTimeString();


        return view('servicio.create', compact('servicio','trufis','salida','fecha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Servicio::$rules);

        $servicio = Servicio::create($request->all());

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicio = Servicio::find($id);

        return view('servicio.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicio = Servicio::find($id);
        $trufis = Trufi::pluck('id','id');

        // $salida = $this->dti->toTimeString();

        $TiempoActual = Carbon::now();
        $llegada = $TiempoActual->toTimeString();

        return view('servicio.edit', compact('servicio','trufis','llegada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Servicio $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
        request()->validate(Servicio::$rules);

        $servicio->update($request->all());

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $servicio = Servicio::find($id)->delete();

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio deleted successfully');
    }
}
