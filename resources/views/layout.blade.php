<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>@yield('title', 'Laravel App')</title>
    <style>
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f1f3f5; /* soft light gray */
        color: #212529; /* Bootstrap dark text */
      }
      .header {
        background-color: #2f855a; /* rich green */
        color: #d1fae5; /* light mint */
        padding: 1.5rem;
        border-radius: 0.5rem;
        box-shadow: 0 0.25rem 0.5rem rgba(47, 133, 90, 0.4);
        text-align: center;
        margin-bottom: 1.5rem;
      }
      .page-title {
        background-color: #f6ad55; /* warm orange */
        color: #663c00; /* dark amber */
        padding: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 0.2rem 0.4rem rgba(246, 173, 85, 0.4);
        margin-bottom: 1.5rem;
      }
      .card-custom {
        background-color: #e0e7ff; /* soft blue */
        border-radius: 0.5rem;
        box-shadow: 0 0.25rem 0.5rem rgba(130, 143, 255, 0.35);
        padding: 1.5rem;
      }
      /* Button Styles */
      .btn-primary-custom {
        background-color: #2f855a;
        border-color: #276749;
        color: #d1fae5;
        transition: background-color 0.3s ease;
      }
      .btn-primary-custom:hover {
        background-color: #276749;
        color: #e6fff4;
      }
      .btn-secondary-custom {
        background-color: #f6ad55;
        border-color: #dd6b20;
        color: #663c00;
        transition: background-color 0.3s ease;
      }
      .btn-secondary-custom:hover {
        background-color: #dd6b20;
        color: #fff7e6;
      }
      /* Form Styles */
      .form-control {
        border-radius: 0.375rem;
        border: 1.5px solid #cbd5e0;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
      }
      .form-control:focus {
        border-color: #2f855a;
        box-shadow: 0 0 0 0.2rem rgba(47, 133, 90, 0.25);
      }
      .form-label {
        color: #276749;
        font-weight: 600;
      }
    </style>
</head>
<body>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">

      <!-- Header -->
      <div class="header">
        <h2 class="mb-0">CRUD</h2>
      </div>

      <!-- Page Title -->
      <div class="page-title">
        <h4 class="mb-0">@yield('title')</h4>
      </div>

      <!-- Flash Message -->
      @if (session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <!-- Page Content -->
      <div class="card-custom">
        @yield('content')
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFY3U5WX6t27nDLPUjzy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
</body>
</html>
