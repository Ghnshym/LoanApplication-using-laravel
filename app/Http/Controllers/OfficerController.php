<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loan_application;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AcceptedLoanOfficer;
use App\Notifications\RejectedLoanByOfficer;

class OfficerController extends Controller
{
    public function requested_application(){

        if(Auth::id() && (Auth::user()->usertype == 'officer'))
        {

                $users = loan_application::paginate(5);
                return view('officer.all_application', compact('users'));
                
            }
            else{

                return redirect('login');
            }
    }

    public function accept_by_officer($id){

        if(Auth::id() && (Auth::user()->usertype == 'officer'))
        {

            $user = loan_application::find($id);
        
            if ($user) {
                $user->status = 'Accepted by office';
                $user->reject_reason = 'none';
                $user->save();
        
                Notification::send($user, new AcceptedLoanOfficer($user));

                return redirect()->back()->with('success', 'Loan request accepted and send email notification');
            }
                
            }
            else{

                return redirect('login');
            }
    }

    public function reject_request($id)
    {
        if(Auth::id() && (Auth::user()->usertype == 'officer'))
        {
            
        return view('officer.reject_page', compact('id'));
        }
        else{
            return redirect('login');
        }
    }

    public function reject_loan_by_officer(Request $request, $id){

        if (Auth::id() && Auth::user()->usertype == 'officer') {
            $user = loan_application::find($id);
            
            if ($user) {
                $user->status = 'Rejected by officer';
                $user->reject_reason = $request->reject;
                $user->save();

                 // Send rejection notification to the user
                Notification::send($user, new RejectedLoanByOfficer($user));

                return redirect('/requested_application')->with('success', 'Loan application rejected successfully and send email.');
                } 
            } else 
            {
                return redirect('login');
            }
    }
}
