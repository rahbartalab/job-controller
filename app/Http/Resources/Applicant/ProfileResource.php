<?php

namespace App\Http\Resources\Applicant;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $applicant = $this->resource;
        return [
            'name' => $applicant->name,
            'email' => $applicant->email,
            'jobTitle' => $applicant->jobTitle,
            'gender' => $applicant->gender,
            'resumeFile' => asset($applicant->resumeFile),
            'state' => $applicant->state,
            'city' => $applicant->city
        ];
    }
}
