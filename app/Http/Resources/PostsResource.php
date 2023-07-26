<?php

namespace App\Http\Resources;

use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string)$this->id,
            'message' => $this->post,
            'mediaType' => $this->mediaType,
            'filePath' => $this->filePath,
            'created_at'=> $this->created_at->format('F dS Y H:ia'),
            'relationships' => [
                    'user_id' => (string)$this->user->id,
                    'user_name' => $this->user->name
            ],
            "reactions" => [
                'likes' => Reaction::where([['post_id', '=' , $this->id],['type', '=','like']])->get(),
            ]
            ];
    }
}
