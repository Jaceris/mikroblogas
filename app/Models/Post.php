<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'private',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeVisible($query)
    {
        // fake auth()
        $userId = env('VITE_USER_ID');

        return $query
            ->where('private', false)
            ->when($userId, function($query) use ($userId) {
                $query->orWhere('user_id', $userId);
            });
    }

    public function scopeVisibleForPublic($query)
    {
        return $query->where('private', false); 
    }

    public function scopeByUserId($query, int $userId)
    {
        return $query->visibleForPublic()->where('user_id', $userId);
    }
}
