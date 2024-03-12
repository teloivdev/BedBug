<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\SForcePolicy;

class WebsiteController extends Controller
{
    public function home(Request $req)
    {
        return view('website.home.index');
    }

    public function fetchPolicy(Request $req)
    {


    }
}