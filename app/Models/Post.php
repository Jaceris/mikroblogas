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
        $user = auth()->user();

        return $query
            ->where('private', false)
            ->when($user, function($query) use ($user) {
                $query->orWhere('user_id', $user->id);
            });
    }

    public function scopeByUserId($query, int $userId)
    {
        return $query->visible()->where('user_id', $userId);
    }
}
