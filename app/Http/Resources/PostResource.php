<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'excerpt' => substr($this->content, 0, 200),
            'content' => $this->content,
            'user_id' => $this->user_id,
            'user_name' => $this->user->name,
            'created_at' => $this->created_at->format('Y-m-d'),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
        ];
    }
}
