<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    use HasFactory;
    /**
     * Champs qu'on peut soumettre
     */
    protected $fillabe = [
        'message'
    ];

    /**
     * Champs qu'on ne peut pas soumettre
     */
    protected $guarded = [];


}
