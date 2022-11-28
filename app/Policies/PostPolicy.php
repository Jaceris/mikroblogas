<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    public function canView(?User $user, Post $post)
    {
        // fake auth()
        $userId = env('VITE_USER_ID');

        return ! $post->private || $userId == $post->user_id
            ? Response::allow()
            : Response::deny('Post is private.');
    }

    public function canManage(?User $user, Post $post)
    {
        // fake auth()
        $userId = env('VITE_USER_ID');

        return $userId == $post->user_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    public function canGetIfNotPrivate(?User $user, Post $post)
    {
        return ! $post->private
            ? Response::allow()
            : Response::deny('Post is private.');
    }
}
