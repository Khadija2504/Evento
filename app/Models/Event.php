<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'date',
        'image',
        'lieu',
        'places_number',
        'id_organisateur',
        'category_id',
        'acceptation',
    ];

    public function reservation()
    {
        return $this->hasMany(reservation::class, 'id_event');
    }
}
