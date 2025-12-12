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

    // Attributs à caster en types spécifiques
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    // Récupère les messages promotionnels actifs
    // Utilisation : PromotionalMessage::active()->get();
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

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

    // Récupère les messages promotionnels actifs pour une date spécifique
    // Utilisation : PromotionalMessage::activeOnDate('2024-12-25')->get();
    public function scopeActiveOnDate($query, $date)
    {
        $dateToCheck = \Carbon\Carbon::parse($date);
        
        return $query
            ->where('is_active', true)
            ->where('start_date', '<=', $dateToCheck)
            ->where('end_date', '>=', $dateToCheck);
    }
}
