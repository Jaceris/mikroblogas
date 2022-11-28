<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index() 
    {
        return PostResource::collection(
            Post::with('user:id,name')
                ->visibleForPublic()
                ->get());
    }

    public function getByUserId(int $userId) 
    {
        return PostResource::collection(
            Post::with('user:id,name')
                ->byUserId($userId)
                ->get());
    }

    public function getSingleWithComments(Post $post) 
    {
        $this->authorize('canGetIfNotPrivate', $post);
       
        return new PostResource($post->load(['comments']));
    }
}
