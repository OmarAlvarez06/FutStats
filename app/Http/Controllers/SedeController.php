<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\PDF;

class SedeController extends Controller
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
        $sedes = Sede::get();
        return view('sedes.sedeIndex', compact('sedes'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function show(Sede $sede)
    {
        return view('sedes.sedeShow', compact('sede'));
    }

    /**
     * 
     * Creates and download a pdf file of all people
     * 
     */
    public function downloadPDF(){

        $data = Sede::all();
        $pdf = app('dompdf.wrapper');
        view()->share('sedes',$data);
        $pdf->loadView('pdfs.sedePDF', $data);
        $pdf->setPaper('a4', 'landscape');
        $name = time() . '_sedes.pdf';
        return $pdf->download($name);
    }

}
