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
        $policyHolder = SForcePolicy::fetchLoggedInUserWithCertificates();
        return view('account.customer.dashboard')->with('policyHolder', $policyHolder);
    }

    public function updatePolicyHolderInformation(Request $req)
    {
        $data = $req->except(['_token', 'Prop_Mgt_Co_Email__c']);
        $user = Auth::user();

        $updateResult = SForcePolicy::updateByID($user->salesforce_id, $data);

        return redirect()->back();
    }

}