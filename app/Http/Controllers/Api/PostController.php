<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index () {
        return PostResource::collection(Post::with('user:id,name')->orderBy('created_at', 'desc')->get());
    }

    public function store(PostRequest $request)
    {
        $post = Post::create($request->validated());

        return new PostResource($post);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->validated());

        return new PostResource($post);
    }
}
