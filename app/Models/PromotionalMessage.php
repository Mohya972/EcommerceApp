<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromotionalMessage extends Model
{
    // Attributs assignables en masse
    protected $fillable = [
        'id',
        'title',
        'content',
        'start_date',
        'end_date',
        'type',
        'is_active',
    ];


    // Récupère les messages promotionnels actifs actuellement
    // Utilisation : PromotionalMessage::activeNow()->get();
    public function scopeActiveNow($query)
    { 
        $now = now();
        return $query
            ->where('is_active', true)
            ->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now);
    }

    public $table = 'promotional_messages';
}
