<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Carbon\Carbon;
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
        try {
            // Validar los datos del formulario
            $request->validate([
                'title' => 'required|string|max:255',
                'start' => 'required|date',
                'end' => 'required|date|after:start',
                'descripcion' => 'nullable|string',
            ]);

            // Crear el evento
            $evento = Evento::create($request->all());

            // Devolver el evento creado en formato JSON
            return response()->json([
                'message' => 'Evento creado correctamente',
                'evento' => $evento
            ], 201); // Código 201: Created
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Devolver errores de validación en formato JSON
            return response()->json([
                'message' => 'Errores de validación',
                'errors' => $e->errors()
            ], 422); // Código 422: Unprocessable Entity
        } catch (\Exception $e) {
            // Devolver el error en formato JSON
            return response()->json([
                'message' => 'Error al crear el evento',
                'error' => $e->getMessage()
            ], 500); // Código 500: Internal Server Error
        }
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

        if (!$evento) {
            return response()->json(['error' => 'Evento no encontrado'], 404);
        }

        // Formatea las fechas usando Carbon::parse
        $evento->start = Carbon::parse($evento->start)->format('Y-m-d\TH:i');
        $evento->end = Carbon::parse($evento->end)->format('Y-m-d\TH:i');

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

        if (!$evento) {
            return response()->json(['error' => 'Evento no encontrado'], 404);
        }

        $evento->update($request->all());

        return response()->json(['message' => 'Evento actualizado correctamente', 'evento' => $evento]);
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
