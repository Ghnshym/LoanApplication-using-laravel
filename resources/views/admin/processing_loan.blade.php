{{-- header --}}
@include('admin.header')
<div class="container">
    <h1 style="text-align: center; font-size: 20px; padding: 40px; font-weight: bold;">All Processing Loan Applications
    </h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
</div>
<div class="table-responsive">
    <table class="table table-success table-striped table-hover">
        <tr>
            <th>User ID</th>
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
            <th>Accept</th>
            <th>Reject</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->user_id }}</td>
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
                <td>
                    <a onclick="return confirm('Are you sure to accept this request')"
                        href="{{ url('/accept_loan_request', $user->id) }}" class="btn btn-success">Accept</a>
                </td>
                <td>
                    <a href="{{ url('/reject_page', $user->id) }}" class="btn btn-danger">Reject</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
<div class="pagination">
    {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
{{-- footer --}}
@include('admin.footer')
