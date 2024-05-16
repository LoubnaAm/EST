<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'commentaire_id',
        'reaction',
    ];

    public function commentaire()
    {
        return $this->belongsTo(Commentaire::class);
    }
}