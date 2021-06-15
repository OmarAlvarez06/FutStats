<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;

class PersonaEncuentroController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas_encuentros = DB::table('vs_personas_encuentros')->get();

        return view('personas_encuentros.personas_encuentrosIndex')->with('personas_encuentros', $personas_encuentros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Leer Encuentros
        $encuentros = DB::table('vs_encuentros')->get();
        //Leer Personas
        $personas = DB::table('personas')->get();

        return view('personas_encuentros.personas_encuentrosForm')
                ->with('encuentros', $encuentros)
                ->with('personas', $personas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insertar = DB::insert('INSERT INTO personas_encuentros (persona_id, encuentro_id, observacion_tipo, minuto) VALUES (?,?,?,?)',[$request->persona, $request->encuentro, $request->observacion_tipo, $request->minuto]);


        $personas_encuentros = DB::table('vs_personas_encuentros')->get();
        return view('personas_encuentros.personas_encuentrosIndex')->with('personas_encuentros', $personas_encuentros);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
