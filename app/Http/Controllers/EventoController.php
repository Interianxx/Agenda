<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Event;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('evento.index');
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
        $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'descripcion' => 'nullable|string',
        ]);

        $evento = Evento::create($request->all());

        return response()->json($evento, 201); // Devuelve el evento creado en formato JSON
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $eventos = Evento::all()->map(function ($evento) {
            return [
                'id' => $evento->id,
                'title' => $evento->title,
                'start' => $evento->start,
                'end' => $evento->end,
                'description' => $evento->descripcion,
            ];
        });

        return response()->json($eventos); // Devuelve los eventos en formato JSON
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $evento = Evento::find($id);
        return response()->json($evento); // Devuelve el evento en formato JSON
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'descripcion' => 'nullable|string',
        ]);

        $evento = Evento::find($id);
        $evento->update($request->all());

        return response()->json($evento); // Devuelve el evento actualizado en formato JSON
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $evento = Evento::find($id);
        $evento->delete();

        return response()->json(['message' => 'Evento eliminado correctamente']);
    }
}
