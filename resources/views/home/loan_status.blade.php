{{-- header --}}
@include('home.header')
<div class="container">
    <h1 style="text-align: center; font-size: 30px; font-weight: bold; margin: 30px;">Your All Application History</h1>
</div>
<div class="table-responsive">
    <table class="table table-success table-striped table-hover">
        <thead>
            <tr style="color: blue;">
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Loan Amount</th>
                <th>Purpose</th>
                <th>Employment Status</th>
                <th>Employer Name</th>
                <th>Job Title</th>
                <th>Monthly Income</th>
                <th>Business Name</th>
                <th>Business Type</th>
                <th>Business Income</th>
                <th>Status</th>
                <th>Reject Reason</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->loan_amount }}</td>
                <td>{{ $user->loan_purpose }}</td>
                <td>{{ $user->employment_status }}</td>
                <td>{{ $user->employer_name }}</td>
                <td>{{ $user->job_title }}</td>
                <td>{{ $user->monthly_income }}</td>
                <td>{{ $user->business_name }}</td>
                <td>{{ $user->business_type }}</td>
                <td>{{ $user->business_monthly_income }}</td>
                <td>{{ $user->status }}</td>
                <td>{{ $user->reject_reason }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- footer --}}
@include('home.footer')
