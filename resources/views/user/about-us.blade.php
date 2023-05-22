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
      <div class="row">
        <div class="col-md-4 py-3 wow zoomIn">
          <div class="card-service">
            <div class="circle-shape bg-secondary text-white">
              <span class="mai-chatbubbles-outline"></span>
            </div>
            <p><span>Chat</span> with a doctors</p>
          </div>
        </div>
        <div class="col-md-4 py-3 wow zoomIn">
          <div class="card-service">
            <div class="circle-shape bg-primary text-white">
              <span class="mai-shield-checkmark"></span>
            </div>
            <p><span>Doctor</span>-Blouse Protection</p>
          </div>
        </div>
        <div class="col-md-4 py-3 wow zoomIn">
          <div class="card-service">
            <div class="circle-shape bg-accent text-white">
              <span class="mai-basket"></span>
            </div>
            <p><span>Doctor</span>-Blouse Pharmacy</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 wow fadeInUp">
          <h1 class="text-center mb-3">Welcome to Your Health Center</h1>
          <div class="text-lg">
            <p>Welcome to Memorial Hospital and Health Care Center's website! Our site
                    holds a wealth of information about the services and programs we offer
                    for our regional community as well as general health news, a provider
                    listing and career opportunities.</p>
            <p>I believe we have an outstanding staff – physicians, clinical and
                    support personnel – whose ultimate goal is to provide you with the
                    best care possible in a respectful and compassionate manner. We are continually
                    looking for new ways to be better at what we do. Please don't hesitate
                    to let us know what we can do to make your visit to Memorial Hospital
                    and Health Care Center more comfortable. As a fundamental component of
                    our mission statement, we allow ourselves to be guided by the needs of
                    those we serve. As needs change, we will change.</p>
            <p>Again, thank you for allowing us to serve you during what is most likely
                    a very vulnerable time in your life. I appreciate the significant trust
                    you place in us!</p>
            <p></p>
          </div>
        </div>
        <div class="col-lg-10 mt-5">
          <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>
          <div class="row justify-content-center">
            @if (!$doctors->isEmpty())
            @foreach ($doctors as $doctor)
            <div class="col-md-6 col-lg-4 wow zoomIn">
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
    </div>
  </div>

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