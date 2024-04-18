<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicantJobRequestController extends Controller
{
    public function send() {
       dd(request('message'));
    }
}
