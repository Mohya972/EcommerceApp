<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactRequest extends Model
{
    // 
    use HasFactory;

    protected $fillable = [
        'type',
        'service',
        'nom',
        'prenom',
        'email',
        'telephone',
        'entreprise',
        'date_evenement',
        'lieu',
        'description',
        'budget_estime',
        'status',
        'notes_admin',
    ];

    //
    protected $casts = [
        'date_evenement' => 'date',
        'budget_estime' => 'decimal:2',
    ];

    // Constantes pour les types
    const TYPE_PRESTATION = 'prestation';
    const TYPE_DEVIS = 'devis';
    const TYPE_EVENEMENT = 'evenement';
    const TYPE_QUESTION = 'question';

    // Constantes pour les services
    const SERVICE_MARIAGE = 'mariage';
    const SERVICE_ENTREPRISE = 'entreprise';
    const SERVICE_EVENEMENT = 'evenementiel';
    const SERVICE_DECORATION = 'decoration';
    const SERVICE_ABONNEMENT = 'abonnement';
    const SERVICE_COURS = 'cours';

    // Constantes pour les statuts
    const STATUS_NOUVEAU = 'nouveau';
    const STATUS_TRAITE = 'traité';
    const STATUS_ANNULE = 'annulé';

    // Méthodes d'accès
    public function getFullNameAttribute()
    {
        return "{$this->prenom} {$this->nom}";
    }

    public function getTypeLabelAttribute()
    {
        return [
            self::TYPE_PRESTATION => 'Demande de prestation',
            self::TYPE_DEVIS => 'Demande de devis',
            self::TYPE_EVENEMENT => 'Organisation d\'événement',
            self::TYPE_QUESTION => 'Question générale',
        ][$this->type] ?? $this->type;
    }

    public function getServiceLabelAttribute()
    {
        $services = [
            self::SERVICE_MARIAGE => 'Décoration de mariage',
            self::SERVICE_ENTREPRISE => 'Fleurissement d\'entreprise',
            self::SERVICE_EVENEMENT => 'Événementiel',
            self::SERVICE_DECORATION => 'Décoration intérieure',
            self::SERVICE_ABONNEMENT => 'Abonnement floral',
            self::SERVICE_COURS => 'Atelier/Cours de composition',
        ];

        return $services[$this->service] ?? $this->service;
    }

    public function isNew()
    {
        return $this->status === self::STATUS_NOUVEAU;
    }

}
