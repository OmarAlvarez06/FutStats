<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Sede;
use App\Models\Encuentro;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\PDF;

class EncuentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matchs = Encuentro::all();

        $encuentros = array();

        foreach($matchs as $encuentro){

            $equipo_local = Equipo::find($encuentro->equipo_local_id);
            $equipo_visitante = Equipo::find($encuentro->equipo_visitante_id);
            $sede = Sede::find($encuentro->sede_id);


            $dato = [
                'encuentro' => $encuentro,
                'equipo_local' => $equipo_local,
                'equipo_visitante' => $equipo_visitante,
                'sede' => $sede,
            ];

            array_push($encuentros,$dato);

        }

        return view ('encuentros.encuentroIndex')->with('encuentros',$encuentros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * 
     * Creates and download a pdf file of all people
     * 
     */
    public function downloadPDF(){

        $matchs = Encuentro::all();

        $data = array();

        foreach($matchs as $encuentro){

            $equipo_local = Equipo::find($encuentro->equipo_local_id);
            $equipo_visitante = Equipo::find($encuentro->equipo_visitante_id);
            $sede = Sede::find($encuentro->sede_id);


            $dato = [
                'encuentro' => $encuentro,
                'equipo_local' => $equipo_local,
                'equipo_visitante' => $equipo_visitante,
                'sede' => $sede,
            ];

            array_push($data,$dato);

        }
        $pdf = app('dompdf.wrapper')->setPaper('a4', 'landscape');
        ;
        view()->share('encuentros',$data);
        $pdf->loadView('pdfs.encuentroPDF', $data);
        $name = time() . '_encuentros.pdf';
        return $pdf->download($name);
    }

}
