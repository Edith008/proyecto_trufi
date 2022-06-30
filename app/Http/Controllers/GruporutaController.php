<?php

namespace App\Http\Controllers;

use App\Models\Gruporuta;
use App\Models\Ruta;

use Illuminate\Http\Request;

/**
 * Class GruporutaController
 * @package App\Http\Controllers
 */
class GruporutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gruporutas = Gruporuta::paginate();

        return view('gruporuta.index', compact('gruporutas'))
            ->with('i', (request()->input('page', 1) - 1) * $gruporutas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gruporuta = new Gruporuta();
        $rutas = Ruta::pluck('nombre','id');

        return view('gruporuta.create', compact('gruporuta','rutas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Gruporuta::$rules);

        $gruporuta = Gruporuta::create($request->all());

        return redirect()->route('gruporutas.index')
            ->with('success', 'Gruporuta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gruporuta = Gruporuta::find($id);

        return view('gruporuta.show', compact('gruporuta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gruporuta = Gruporuta::find($id);
        $rutas = Ruta::pluck('nombre','id');

        return view('gruporuta.edit', compact('gruporuta','rutas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Gruporuta $gruporuta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gruporuta $gruporuta)
    {
        request()->validate(Gruporuta::$rules);

        $gruporuta->update($request->all());

        return redirect()->route('gruporutas.index')
            ->with('success', 'Gruporuta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $gruporuta = Gruporuta::find($id)->delete();

        return redirect()->route('gruporutas.index')
            ->with('success', 'Gruporuta deleted successfully');
    }
}
