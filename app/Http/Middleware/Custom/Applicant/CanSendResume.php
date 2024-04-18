<?php

namespace App\Http\Middleware\Custom\Applicant;

use App\Models\Applicant;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanSendResume
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (get_class($request->user()) !== Applicant::class) {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        if (!$request->user()->isActive) {
            abort(Response::HTTP_FORBIDDEN, "you can't send resume because you are not active");
        }

        return $next($request);
    }
}
