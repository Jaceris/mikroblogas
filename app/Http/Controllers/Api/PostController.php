<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index () {
        return PostResource::collection(
            Post::with('user:id,name')
                ->visible()
                ->orderBy('created_at', 'desc')
                ->get());
    }

    public function store(PostRequest $request)
    {
        $post = Post::create($request->validated());

        return new PostResource($post);
    }

    public function show(Post $post)
    {
        $this->authorize('canView', $post);

        return new PostResource($post->load('comments'));
    }

    public function update(Post $post, PostRequest $request)
    {
        $this->authorize('canManage', $post);

        $post->update($request->validated());

        return new PostResource($post);
    }
}
