<?php

namespace App\Http\Controllers;

use App\Models\Multa;
use App\Models\Socio;
use Illuminate\Http\Request;

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
        $multa = Multa::find($id)->delete();

        return redirect()->route('multas.index')
            ->with('success', 'Multa eliminada.');
    }
}
