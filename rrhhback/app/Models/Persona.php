<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable=[
        'ci',
        'expedido',
        'paterno',
        'materno',
        'nombres',
        'fechanac',
        'profesion',
        'cargo',
        'fechalimite',
        'foto',
        'qr',
    ];
}
