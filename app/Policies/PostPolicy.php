<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    public function access(?User $user, Post $post)
    {
        return ! $post->private || optional($user)->id === $post->user_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }   
}
