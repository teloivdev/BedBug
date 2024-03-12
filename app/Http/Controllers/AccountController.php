<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\SForcePolicy;
use Log;

class AccountController extends Controller
{
    public function dashboard(Request $req)
    {
        $policyHolder = SForcePolicy::fetchWithCertificates(Auth::user()->salesforce_id);
        return view('dashboard')->with('policyHolder', $policyHolder);
    }

}