<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_event',
        'ticket_number',
        'status',
    ];

    public function event(){
        return $this->belongsTo(Event::class, 'id_event');
    }
}
