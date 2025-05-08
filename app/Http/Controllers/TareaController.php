<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Http\Requests\StoreTareaRequest;
use App\Http\Requests\UpdateTareaRequest;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth'); // Applies to all methods
    }
    
    public function index(Request $request)
    {
        $userId = auth()->id();

        // Start with only the current user’s tasks (and any they’re invited to)
        $query = Tarea::with('owner')
            ->where(function($q) use ($userId) {
                $q->where('user_id', $userId);
                // ->orWhereHas('invitedUsers', fn($q2) => $q2->where('user_id', $userId));
            });

        // Apply the search filter if present
        if ($search = $request->input('search')) {
            $query->where(fn($q) => 
                $q->where('nombre', 'like', "%{$search}%")
                ->orWhere('descripcion', 'like', "%{$search}%")
            );
        }

        // Order, paginate, keep query string
        $tareas = $query
            ->orderBy('fecha_limite', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('tareas.index', compact('tareas'));
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
    public function store(StoreTareaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        // Check if the authenticated user is the owner of the task
        if ($tarea->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('tareas.show', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTareaRequest $request, Tarea $tarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tareas.index')->with('success', 'Tarea deleted successfully');
    }
}
