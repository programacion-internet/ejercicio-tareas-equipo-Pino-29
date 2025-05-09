<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth'); // Applies to all methods
    }

    public function index(Tarea $tarea)
    {
        $archivos = $tarea->archivos()->with('uploader')->get();

        return view('tarea.partials._files', compact('tarea', 'archivos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Archivo $archivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Archivo $archivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Archivo $archivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archivo $archivo)
    {
        //
    }
}
