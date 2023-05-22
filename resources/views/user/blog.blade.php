<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="/assets/css/maicons.css">

  <link rel="stylesheet" href="/assets/css/bootstrap.css">

  <link rel="stylesheet" href="/assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="/assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="/assets/css/theme.css">

  <link rel="stylesheet" href="/assets/css/custom.css">
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

  <div class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            @if (!empty($blogs))
              @foreach ($blogs as $blog)
              <div class="col-sm-6 py-3">
                <div class="card-blog">
                  <div class="header">
                    <div class="post-category">
                      <a href="#">{{ $blog->category_name }}</a>
                    </div>
                    <a href="{{ '/news/' . $blog->slug }}" class="post-thumb">
                      <img src="{{ '/images/blogs/' . $blog->image }}" alt="">
                    </a>
                  </div>
                  <div class="body">
                    <h5 class="post-title"><a href="{{ '/news/' . $blog->slug }}" tabindex="0" data-bs-toggle="tooltip" title="{{ $blog->name }}">{{ $blog->name }}</a></h5>
                    <div class="site-info">
                      <div class="avatar mr-2 cursor-pointer" onclick="window.location.href = '{{ route('news.author', ['name' => $blog->author_name]) }}'">
                        <div class="avatar-img">
                          <img src="/assets/img/person/person_1.jpg" alt="">
                        </div>
                        <span>{{ $blog->author_name }}</span>
                      </div>
                      <span class="mai-time"></span> {{ $blog->diff_date }}
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            @endif
            <div class="col-12 my-5">
              <nav aria-label="Page Navigation">
                <ul class="pagination justify-content-center">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                  </li>
                  <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div> <!-- .row -->
        </div>
        <!-- sidebar -->
        @include('user.layouts.sidebar')
        <!-- end sidebar -->
      </div> <!-- .row -->
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <!-- footer -->
  @include('user.layouts.footer')
  <!-- end footer -->

<script src="/assets/js/jquery-3.5.1.min.js"></script>

<script src="/assets/js/bootstrap.bundle.min.js"></script>

<script src="/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="/assets/vendor/wow/wow.min.js"></script>

<script src="/assets/js/theme.js"></script>
  
</body>
</html>