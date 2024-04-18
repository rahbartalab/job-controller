<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        /** @var User $user */
        $user = User::query()->where('email', request('email'))->firstOrFail();

        if (!Hash::check(request('password'), $user->password)) {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('auth')->plainTextToken;
        return response()->json([
            'token' => $token
        ]);
    }
}
