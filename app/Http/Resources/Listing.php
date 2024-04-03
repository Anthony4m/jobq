<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Listing extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'title' => $this->title,
            'tags' => $this->tags,
            'logo' => $this->logo,
            'company' => $this->company,
            'email' => $this->email,
            'website' => $this->website,
            'location' => $this->location,
            'salary' => $this->salary,
            'applicants' => JobApplicationResource::collection($this->whenLoaded('applicants')), // (1
            'description' => $this->description,
            'created_at' => $this->created_at,
        ];
    }
}
