{{-- header --}}
@include('admin.header')

<style>
    .dashboard-item {
        width: 300px;
        margin: 10px;
    }
</style>

<h1 style="text-align: center; font-size: 25px; margin: 25px; font-weight: bold;">Admin Dashboard</h1>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card dashboard-item bg-primary">
                <div class="card-body text-center">
                    <h5 class="card-title"><b>Total User:</b></h5>
                    <p class="card-text">{{ $total_user }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card dashboard-item bg-danger">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Loan Reject</h5>
                    <p class="card-text">{{ $total_loan_reject }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card dashboard-item bg-success">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Loan Requested</h5>
                    <p class="card-text">{{ $total_loan_request }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card dashboard-item bg-success">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Amount Requested</h5>
                    <p class="card-text">{{ $total_amount_request }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card dashboard-item bg-primary">
                <div class="card-body text-center">
                    <h5 class="card-title"><b>Total Loan Accepted:</b></h5>
                    <p class="card-text">{{ $total_loan_accept }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card dashboard-item bg-danger">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Loan Processing</h5>
                    <p class="card-text">{{ $total_loan_processing }}</p>
                </div>
            </div>
        </div>
    </div>


    {{-- footer --}}
    @include('admin.footer')
