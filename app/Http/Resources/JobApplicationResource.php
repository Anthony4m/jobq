<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'jobListingId' => $this->job_listing_id,
            'userId' => $this->user_id,
            'resume' => $this->resume,
            'coverLetter' => $this->cover_letter,
            'status' => $this->status,
        ];
    }
}
