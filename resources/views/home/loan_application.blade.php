{{-- header  --}}
@include('home.header')

<div>
    <h1 style="text-align: center; font-size:20px; padding:40px;font-weight:bold">Loan Application Form</h1>
</div>
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('loan_store') }}">
        @csrf

        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                name="first_name" value="{{ old('first_name') }}" required>
            @error('first_name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                name="last_name" value="{{ old('last_name') }}" required>
            @error('last_name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                name="phone_number" value="{{ old('phone_number') }}" required>
            @error('phone_number')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                name="email" value="{{ old('email') }}" required>
            @error('email')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="loan_amount" class="form-label">Loan Amount Requested</label>
            <input type="number" step="0.01" class="form-control @error('loan_amount') is-invalid @enderror"
                id="loan_amount" name="loan_amount" value="{{ old('loan_amount') }}" required>
            @error('loan_amount')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="loan_purpose" class="form-label">Purpose of the Loan</label>
            <textarea class="form-control @error('loan_purpose') is-invalid @enderror" id="loan_purpose" name="loan_purpose"
                rows="3" required>{{ old('loan_purpose') }}</textarea>
            @error('loan_purpose')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="employment_status" class="form-label">Employment Status</label>
            <select class="form-control @error('employment_status') is-invalid @enderror" id="employment_status"
                name="employment_status" required>
                <option value="employed">Employed</option>
                <option value="self-employed">Self-employed</option>
                <option value="unemployed">Unemployed</option>
            </select>
            @error('employment_status')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div id="employedFields" class="d-none">
            <div class="mb-3">
                <label for="employer_name" class="form-label">Employer Name</label>
                <input type="text" class="form-control @error('employer_name') is-invalid @enderror"
                    id="employer_name" name="employer_name" value="{{ old('employer_name') }}">
                @error('employer_name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="job_title" class="form-label">Job Title</label>
                <input type="text" class="form-control @error('job_title') is-invalid @enderror" id="job_title"
                    name="job_title" value="{{ old('job_title') }}">
                @error('job_title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="monthly_income" class="form-label">Monthly Income</label>
                <input type="number" step="0.01"
                    class="form-control @error('monthly_income') is-invalid @enderror" id="monthly_income"
                    name="monthly_income" value="{{ old('monthly_income') }}">
                @error('monthly_income')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div id="selfEmployedFields" class="d-none">
            <div class="mb-3">
                <label for="business_name" class="form-label">Business Name</label>
                <input type="text" class="form-control @error('business_name') is-invalid @enderror"
                    id="business_name" name="business_name" value="{{ old('business_name') }}">
                @error('business_name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="business_type" class="form-label">Business Type</label>
                <input type="text" class="form-control @error('business_type') is-invalid @enderror"
                    id="business_type" name="business_type" value="{{ old('business_type') }}">
                @error('business_type')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="business_monthly_income" class="form-label">Business Monthly Income</label>
                <input type="number" step="0.01"
                    class="form-control @error('business_monthly_income') is-invalid @enderror"
                    id="business_monthly_income" name="business_monthly_income"
                    value="{{ old('business_monthly_income') }}">
                @error('business_monthly_income')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary" style="color: black">Submit</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const employmentStatus = document.getElementById('employment_status');
        const employedFields = document.getElementById('employedFields');
        const selfEmployedFields = document.getElementById('selfEmployedFields');

        // Show/hide fields based on selected employment status
        employmentStatus.addEventListener('change', function() {
            if (employmentStatus.value === 'employed') {
                employedFields.classList.remove('d-none');
                selfEmployedFields.classList.add('d-none');
            } else if (employmentStatus.value === 'self-employed') {
                employedFields.classList.add('d-none');
                selfEmployedFields.classList.remove('d-none');
            } else {
                employedFields.classList.add('d-none');
                selfEmployedFields.classList.add('d-none');
            }
        });

        // Trigger the change event initially to handle pre-selected values
        employmentStatus.dispatchEvent(new Event('change'));
    });
</script>

{{-- foooter --}}
@include('home.footer')
