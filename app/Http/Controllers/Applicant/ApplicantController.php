<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\Profile\UpdateProfileRequest;
use App\Http\Resources\Applicant\ProfileResource;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ApplicantController extends Controller
{
    public function showProfile(): ProfileResource
    {
        return ProfileResource::make(request()->user());
    }

    public function updateProfile(UpdateProfileRequest $request): ProfileResource
    {
        $request->user()->update($request->validated());

        return ProfileResource::make(request()->user());
    }
}
