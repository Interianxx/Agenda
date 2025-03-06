<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $contacts = Contact::query()
                ->with([
                    'user',
                    'category',
                ])
                ->where('user_id', Auth::id())
                ->orderBy('id', 'desc')
                ->paginate(10);

            return view('contacts.index', [
                'contacts' => $contacts
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $contact = new Contact();
            $categories = Category::all();

            return view('contacts.create', [
                'contact' => $contact,
                'categories' => $categories
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        try {
            $data = $request->validated();

            Contact::create($data);

            return to_route('contacts.index')->with('sessionMessage', 'Contacto Creado Correctamente');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        try {
            // Verificar que el contacto pertenece al usuario autenticado
            if ($contact->user_id !== Auth::id()) {
                // Solo pasamos 'accessDenied' para que se active el modal en la vista
                return view('contacts.show', [
                    'accessDenied' => true,  // Flag para indicar acceso denegado
                ]);
            }

            // Cargar las relaciones del contacto
            $contact->load([
                'user',
                'category',
            ]);

            // Mostrar la vista del contacto
            return view('contacts.show', [
                'contact' => $contact,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        try {
            // Verificar que el contacto pertenece al usuario autenticado
            if ($contact->user_id !== Auth::id()) {
                return redirect()->route('contacts.index')->with('error', 'No tienes acceso a este contacto.');
            }

            // Obtener todas las categorías y mostrar el formulario de edición
            $categories = Category::all();

            return view('contacts.edit', [
                'contact' => $contact,
                'categories' => $categories
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        try {
            $data = $request->validated();

            $contact->update($data);


            return to_route('contacts.index')->with('sessionMessage', 'Contacto Actualizado Correctamente');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        try {
            // Verificar que el contacto pertenece al usuario autenticado
            if ($contact->user_id !== Auth::id()) {
                return redirect()->route('contacts.index')->with('error', 'No tienes acceso a este contacto.');
            }

            // Eliminar el contacto
            $contact->delete();

            return to_route('contacts.index')->with('sessionMessage', 'Contacto Eliminado Correctamente');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}