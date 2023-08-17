{{-- header  --}}
@include('admin.header')

         <div class="container">
            <h1 style="text-align: center;padding:20px; font-size:30px;font-weight:bold">Mention Reason For Reject</h1>
            <div class="mb-3">
                <form action="{{ url('reject_loan', $id) }}" method="POST">
                    @csrf
                <label for="reject" class="form-label">Loan Reject Reason</label>
                <input type="text" class="form-control" name="reject">
              </div>
              <button type="submit" class="btn btn-success" style="color:black">Submit</button>
            </form>
         </div>
    
{{-- foooter --}}
@include('admin.footer')