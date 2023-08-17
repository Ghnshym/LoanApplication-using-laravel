{{-- header --}}
@include('admin.header')
<div class="container">
    <h1 style="text-align: center; font-size: 20px; padding: 40px; font-weight: bold;">All Accepted Loan Application</h1>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
</div>
<div class="table-responsive">
    <table class="table table-success table-striped table-hover">
        <thead>
            <tr>
                <th>User id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Loan amount</th>
                <th>Purpose</th>
                <th>Employment status</th>
                <th>Employer name</th>
                <th>Job title</th>
                <th>Monthly income</th>
                <th>Business Name</th>
                <th>Business Type</th>
                <th>Business income</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
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
                <td>
                    <a href="{{ url('/reject_page', $user->id) }}" class="btn btn-danger">Reject</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
    {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
{{-- footer --}}
@include('admin.footer')
