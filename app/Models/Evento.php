<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['title', 'descripcion', 'start', 'end'];

    public static $rules = [
        'title' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'start' => 'required|date',
        'end' => 'nullable|date|after_or_equal:start'
    ];
}
