<?php

namespace App\Http\Controllers;

use App\Models\Chofere;
use Illuminate\Http\Request;
use PDF;

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
    public function index()
    {
        $choferes = Chofere::paginate();

        return view('chofere.index', compact('choferes'))
            ->with('i', (request()->input('page', 1) - 1) * $choferes->perPage());
    }

    public function pdf()
    {
        $choferes = Chofere::paginate();

        $pdf = PDF::loadView('chofere.pdf',['choferes'=>$choferes]);
       // $pdf->loadHTML('<h1> test </h1>');
        //return $pdf->stream();
        return $pdf->download('_choferes.pdf');

    //    return view('chofere.pdf', compact('choferes'));   
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
        $chofere = Chofere::find($id)->delete();

        return redirect()->route('choferes.index')
            ->with('success', 'Información del Chofer eliminado con exito.');
    }
}