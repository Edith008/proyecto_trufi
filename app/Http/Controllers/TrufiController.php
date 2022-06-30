<?php

namespace App\Http\Controllers;

use App\Models\Trufi;
use App\Models\Chofere;
use App\Models\Vehiculo;
use App\Models\Gruporuta;
use Illuminate\Http\Request;

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
        $trufi = Trufi::find($id)->delete();

        return redirect()->route('trufis.index')
            ->with('success', 'Trufi deleted successfully');
    }
}
