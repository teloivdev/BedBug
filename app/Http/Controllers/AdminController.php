<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\SForcePolicy;
use Log;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;

class AdminController extends Controller
{
    public function loginRedirect(Request $req)
    { 
        $user = Auth::user();
        $redirect = '';

        switch($user->role)
        {
            case 'admin':
                $redirect = '/admin/dashboard';
                break;
            case 'customer':
                $redirect = '/dashboard';
                break;
        }

        return redirect($redirect);
    }
    public function dashboard(Request $req)
    {
        $policies = SForcePolicy::fetchAllPoliciesMinimal();
        $currentDate = Carbon::today();
        $activeCertificates = 0;
        $upcomingRenewals = 0;

        foreach($policies as $p)
        {
            if (count($p->certificates))
            {
                $activeCertificates += count($p->certificates);
                foreach($p->certificates as $cert)
                {
                    $expirationDate = Carbon::parse($cert->Certificate_Expiration_Date__c);
                    if ($currentDate->diffInDays($expirationDate) < 60)
                        $upcomingRenewals++;
                }
            }
        }
        return view('account.admin.dashboard')->with(['activeCertificates' => $activeCertificates, 'upcomingRenewals' => $upcomingRenewals]);
    }

    public function activePolicies(Request $req)
    {
        $policies = SForcePolicy::fetchAllPoliciesMinimal();
        foreach($policies as $key => &$p)
        {
            if (!count($p->certificates))
            {
                unset($policies[$key]);
            }
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 1;
        $offset = $perPage * ($currentPage - 1);
        $itemstoshow = array_slice($policies , $offset , $perPage);
        $policiesPaginator = new LengthAwarePaginator($itemstoshow, count($policies), $perPage, $currentPage);
        $policiesPaginator->setPath('/admin/policies');

        return view('account.admin.activePolicies')->with('policies', $policiesPaginator);
    }
}