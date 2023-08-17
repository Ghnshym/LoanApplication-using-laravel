<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .navbar-nav.right-aligned {
            padding-right: 10px;
        }
    </style>

    <title>LoanApp!</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/home') }}">LoanApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ url('/requested_application') }}">Application</a>
                </li>
            </ul>
            <ul class="navbar-nav right-aligned">
                <li class="nav-item">
                    <x-app-layout>
                    </x-app-layout>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h1 style="text-align: center; font-size:20px; padding:40px;font-weight:bold">All Application </h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
</div>

<div class="container">
    <div class="table-responsive">
        <table class="table table-success table-striped table-hover">
            <thead>
            <tr>
                {{-- <th>User id</th> --}}
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>loan amount</th>
                <th>Purpose</th>
                <th>employment status</th>
                <th>employer name</th>
                <th>job title</th>
                <th>Monthly income</th>
                <th>Business Name</th>
                <th>Business Type</th>
                <th>Business income</th>
                <th>Status</th>
                <th>reject reason</th>
                <th>accept</th>
                <th>reject</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user )
                <tr>
                    {{-- <td>{{ $user->user_id }}</td> --}}
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
                        <a onclick="return confirm('Are you sure to accepted this request')" href="{{ url('/accept_by_officer', $user->id) }}" class="btn btn-success">Accept</a>
                    </td>
                    <td>
                        <a href="{{ url('/reject_request', $user->id) }}" class="btn btn-danger">Reject</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="container mt-3">
    {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
