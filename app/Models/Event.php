<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
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

    public function organisateurs(){
        return $this->belongsTo(User::class, 'id_organisateur');
    }

    public function category(){
        return $this->belongsTo(Categorie::class, 'category_id');
    }
}
