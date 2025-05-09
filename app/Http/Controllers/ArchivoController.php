<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArchivoRequest;
use App\Models\Tarea;
use App\Models\Archivo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

use Illuminate\Routing\Controller;

class ArchivoController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    // List all files for a tarea
    public function index(Tarea $tarea)
    {
        $this->authorize('view', $tarea);

        $archivos = $tarea->archivos()
                          ->with('uploader')
                          ->latest()
                          ->get();

        return view('tareas.partials._files', compact('tarea', 'archivos'));
    }

    // Upload a new file
    public function store(StoreArchivoRequest $request, Tarea $tarea)
    {
        $this->authorize('update', $tarea);

        $file = $request->file('archivo');
        $filepath = $file->store('tareas/'.$tarea->id);
        $archivo = new Archivo([
            'tarea_id' => $tarea->id,
            'user_id' => auth()->id(),
            'original_name' => $file->getClientOriginalName(),
            'path' => $filepath,
        ]);

        $archivo->save();
        $tarea->archivos()->save($archivo);

        return back()->with('success', 'Archivo subido correctamente');
    }

    // Download a file
    public function show(Tarea $tarea, Archivo $archivo)
    {
        $this->authorize('view', $tarea);

        return Storage::disk('public')
                      ->download($archivo->path, $archivo->original_name);
    }

    // Delete a file
    public function destroy(Tarea $tarea, Archivo $archivo)
    {
        $this->authorize('update', $tarea);

        Storage::disk('public')->delete($archivo->path);
        $archivo->delete();

        return back()->with('success', 'Archivo eliminado correctamente');
    }


    public function download(Tarea $tarea, Archivo $archivo)
    {
        $this->authorize('view', $tarea);

        return Storage::disk()
                      ->download($archivo->path, $archivo->original_name);
    }
}