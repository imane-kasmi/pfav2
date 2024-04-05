<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'topic_id', 'description', 'keywords', 'photo', 'published_at'
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
    public function getPhotoAttribute($value)
    {
        return asset('storage/' . $value);
    }
}

