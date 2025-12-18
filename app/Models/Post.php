<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    // les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'title',
        'slug',
        'short_content',
        'content',
        'image',
        'published_at',
    ];

    // les attributs qui doivent être convertis en types natifs
    protected $casts = [
        'published_at' => 'datetime',
    ];

    // relation avec le modèle Comment
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // utiliser le slug pour les routes au lieu de l'ID
    public function getRouteKeyName()
    {
        return 'slug';
    }

    
}
