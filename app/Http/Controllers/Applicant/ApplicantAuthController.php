<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Applicant;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ApplicantAuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        /** @var Applicant $user */
        $user = Applicant::query()->where('email', request('email'))->firstOrFail();

        if (!Hash::check(request('password'), $user->password)) {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('auth')->plainTextToken;
        return response()->json([
            'token' => $token
        ]);
    }
}
