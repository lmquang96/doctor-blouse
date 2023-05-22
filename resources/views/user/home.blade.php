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

  <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <!-- header -->
  @include('user.layouts.header')
  <!-- end header -->

  <div class="page-hero bg-image overlay-dark" style="background-image: url(/images/banner/main.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">{{ __('Let\'s make your life happier') }}</span>
        <h1 class="display-4">{{ __('Healthy Living') }}</h1>
        <a href="#appointment-form" class="btn btn-primary">{{ __('Let\'s Consult') }}</a>
      </div>
    </div>
  </div>


  <div class="bg-light">
    <!-- card services -->
    @include('user.layouts.home.card-services')
    <!-- end card services -->

    <!-- welcome -->
    @include('user.layouts.home.welcome')
    <!-- end welcome -->
  </div> <!-- .bg-light -->

  <!-- doctors slider -->
  @include('user.layouts.home.doctors-slider')
  <!-- end doctors slider -->

  <!-- latest news -->
  @include('user.layouts.home.latest-news')
  <!-- end latest news -->

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