<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\loan_application;
use Illuminate\Support\Facades\Validator;
use App\Notifications\LoanApplicationSubmitted;
use Illuminate\Support\Facades\Notification;


class HomeController extends Controller
{
    public function index(){

        if(Auth::id())
        {

            $usertype = Auth()->user()->usertype;

            if($usertype == 'admin'){

                $total_user = User::all()->count();
                $total_loan_request = loan_application::all()->count();
                $total_loan_reject = loan_application::where('status', '=', 'Rejected')->orWhere('status', '=', 'Rejected by officer')->get()->count();
                $total_loan_accept = loan_application::where('status', '=', 'Accepted')->orWhere('status','=','Accepted by office')->get()->count();
                $total_loan_processing = loan_application::where('status', '=', 'processing')->get()->count();

                $order = loan_application::all();
                $total_amount_request = 0;
                foreach($order as $order){
                    $total_amount_request = $total_amount_request + $order->loan_amount;
                }

                return view('admin.adminhome', compact('total_user', 'total_loan_reject','total_loan_request','total_loan_accept','total_loan_processing','total_amount_request'));
            }

            else if($usertype == 'officer'){

                return view('officer.officerhome');
            }

            else if($usertype == 'user'){

                return view('home.userhome');
            }

            else{

                return redirect()->back();
            }


        }

    }

    public function loan_application(){

        if(Auth::id() && (Auth::user()->usertype == 'user'))
        {

        return view ('home.loan_application');

        }
        else
        {
            return redirect('login');
        }
    }

    public function loan_store(Request $request){

        if(Auth::id() && (Auth::user()->usertype == 'user'))
        {

        $user = Auth()->user();

        $user_id = $user->id;
        // dd($user_id);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'loan_amount' => 'required|numeric|min:1',
            'loan_purpose' => 'required|string|max:1000',
            'employment_status' => 'required|in:employed,self-employed,unemployed',
            // Add more validation rules for other fields...
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        // If validation passes, create and save the loan application record
        $loanApplication = new loan_application();
        $loanApplication->user_id = $user_id;
        $loanApplication->first_name = $request->input('first_name');
        $loanApplication->last_name = $request->input('last_name');
        $loanApplication->phone_number = $request->input('phone_number');
        $loanApplication->email = $request->input('email');
        $loanApplication->loan_amount = $request->input('loan_amount');
        $loanApplication->loan_purpose = $request->input('loan_purpose');
        $loanApplication->employment_status = $request->input('employment_status');

        if ($request->input('employment_status') === 'employed') {
            $loanApplication->employer_name = $request->input('employer_name');
            $loanApplication->job_title = $request->input('job_title');
            $loanApplication->monthly_income = $request->input('monthly_income');
        } 
        elseif ($request->input('employment_status') === 'self-employed') {
            $loanApplication->business_name = $request->input('business_name');
            $loanApplication->business_type = $request->input('business_type');
            $loanApplication->business_monthly_income = $request->input('business_monthly_income');
        }

        $loanApplication->save();

        //send notification email
        $applicant = Auth::user();
        Notification::send($applicant, new LoanApplicationSubmitted());

        return redirect()->back()->with('success', 'Loan application submitted successfully.');

        }
        else{
            return redirect('login');
        }
    }

    public function loan_status(){

        if(Auth::id() && (Auth::user()->usertype == 'user'))
        {

        $user = Auth::user();
        $userid = $user->id;
        
        $users = loan_application::where('user_id', '=', $userid)->get();

        return view('home.loan_status', compact('users'));

        }
        else
        {
            return redirect('login');
        }
    }
}









