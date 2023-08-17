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
          
          
            <h1 style="text-align: center; font-size:25px; font-weight:bold;margin-top: 20px;color:blue;">Loan Officer Home Page : </h1>
            <p style="text-align: center; font-size:18px; font-weight:bold;margin-top: 15px;color:red;">Here You can initial Accept or Reject loan application with officer level that is reviewed by Administration in the end and Accept or Reject loan Application </p>
            <div class="d-flex justify-content-center">
              <a class="btn btn-primary mt-3" href="{{ url('/requested_application') }}">View Applicant</a>
          </div>
          
          
     
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </body>
        </html>
