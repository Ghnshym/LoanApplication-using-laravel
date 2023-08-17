<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\loan_application;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LoanApplicationAccepted;
use App\Notifications\RejectedLoanApplication;


class AdminController extends Controller
{
    public function all_application(){

        if(Auth::id() && (Auth::user()->usertype == 'admin'))
        {

                $users = loan_application::paginate(5);
                return view('admin.all_application', compact('users'));
                
            }
            else{

                return redirect('login');
            }

    }

    public function accept_loan_request($id)
{
    if (Auth::id() && Auth::user()->usertype == 'admin') {
        $user = loan_application::find($id);
        
        if ($user) {
            $user->status = 'Accepted';
            $user->reject_reason = 'none';
            $user->save();
    
            // Send email notification to the user
            Notification::send($user, new LoanApplicationAccepted($user));

            return redirect()->back()->with('success', 'Loan request accepted and notification sent.');
        } else {
            return redirect()->back()->with('error', 'Loan request not found.');
        }
    } else {
        return redirect('login');
    }
}

    public function reject_page($id)
    {

        if(Auth::id() && (Auth::user()->usertype == 'admin'))
        {
            
        return view('admin.reject_page', compact('id'));
        }
        else{
            return redirect('login');
        }
    }


        public function reject_loan(Request $request, $id)
    {
        if (Auth::id() && Auth::user()->usertype == 'admin') {
            $user = loan_application::find($id);
            
            if ($user) {
                $user->status = 'Rejected';
                $user->reject_reason = $request->reject;
                $user->save();

                // Send rejection notification to the user
                Notification::send($user, new RejectedLoanApplication($user));

                return redirect('/all_application')->with('success', 'Loan application rejected successfully');
            } else {
                return redirect()->back()->with('error', 'Loan application not found.');
            }
        } else {
            return redirect('login');
        }
    }

    public function accept_loan()
    {
        if(Auth::id() && (Auth::user()->usertype == 'admin'))
        {

            $users = loan_application::where('status', '=', 'Accepted')
            ->orWhere('status','=','Accepted by office')
            ->paginate(10);

            return view('admin.accept_loan', compact('users'));
        }
        else{
            return redirect('login');
        }
    }

    public function loan_reject()
    {
        if(Auth::id() && (Auth::user()->usertype == 'admin'))
        {

            $users = loan_application::where('status', '=', 'Rejected')
            ->orWhere('status', '=', 'Rejected by officer')->paginate(10);

            return view('admin.loan_reject', compact('users'));
        }
        else{
            return redirect('login');
        }
    }

    public function processing_loan()
    {
        if(Auth::id() && (Auth::user()->usertype == 'admin'))
        {

            $users = loan_application::where('status', '=', 'processing')->paginate(10);

            return view('admin.processing_loan', compact('users'));
        }
        else{
            return redirect('login');
        }
    }


}
