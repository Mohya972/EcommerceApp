<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    // les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'post_id',
        'name',
        'email',
        'content',
        'is_approved',
    ];

    // les attributs qui doivent être convertis en types natifs
    protected $casts = [
        'is_approved' => 'boolean',
    ];

    // relation avec le modèle Post
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }


}
