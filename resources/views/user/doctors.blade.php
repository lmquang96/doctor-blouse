<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <!-- header -->
  @include('user.layouts.header')
  <!-- end header -->

  <!-- page banner -->
  @include('user.layouts.page-banner')
  <!-- end page banner -->

  <div class="page-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="row">
            @if (!$doctors->isEmpty())
                @foreach ($doctors as $doctor)
                <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                    <div class="card-doctor">
                      <div class="header">
                        <img src="{{ '/images/doctor/' . $doctor->image }}" alt="">
                        <div class="meta">
                          <a href="#"><span class="mai-call"></span></a>
                          <a href="#"><span class="mai-logo-whatsapp"></span></a>
                        </div>
                      </div>
                      <div class="body">
                        <p class="text-xl mb-0">Dr. {{ $doctor->first_name . ' ' . $doctor->last_name }}</p>
                        <span class="text-sm text-grey">{{ $doctor->specialty_name }}</span>
                      </div>
                    </div>
                  </div>
                @endforeach
            @endif
          </div>
        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <!-- appointment -->
  @include('user.layouts.home.appointment')
  <!-- end appointment -->
  

  <!-- footer -->
  @include('user.layouts.footer')
  <!-- end footer -->

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>