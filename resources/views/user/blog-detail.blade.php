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
  @include('user.layouts.header');
  <!-- end header -->

  <div class="page-section pt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <nav aria-label="Breadcrumb">
            <ol class="breadcrumb bg-transparent py-0 mb-5">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('news') }}">News</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $blog->name }}</li>
            </ol>
          </nav>
        </div>
      </div> <!-- .row -->

      <div class="row">
        <div class="col-lg-8">
          <article class="blog-details">
            <div class="post-thumb">
              <img src="{{ '/images/blogs/' . $blog->image }}" alt="">
            </div>
            <div class="post-meta">
              <div class="post-author">
                <span class="text-grey">By</span> <a href="#">{{ $blog->author_name }}</a>  
              </div>
              <span class="divider">|</span>
              <div class="post-date">
                <a href="#">{{ $blog->created_date_format }}</a>
              </div>
              <span class="divider">|</span>
              <div>
                <a href="#">{{ $blog->category_name }}</a>  
              </div>
              <span class="divider">|</span>
              <div class="post-comment-count">
                <a href="#">{{ $blog->commentCount }} Comments</a>
              </div>
            </div>
            <h2 class="post-title h1">{{ $blog->name }}</h2>
            <div class="post-content">
              {!! $blog->content !!}
            </div>
            <div class="post-tags">
              @foreach ($blog->arrTags as $tag)
              <a href="{{ route('news.tag', ['tag' => $tag]) }}" class="tag-link">{{ $tag }}</a>
              @endforeach
            </div>
          </article> <!-- .blog-details -->

          @if (!$comments->isEmpty())
          <div class="mt-1 d-flex justify-content-center comment-area">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <h2>Comments ({{ count($comments) }})</h2>
                        <ul class="list-unstyled">
                            @foreach ($comments as $comment)
                            <li class="media mb-3">
                              <span class="round pt-2">
                                <img src="https://img.icons8.com/bubbles/100/000000/groups.png" class="align-self-start mr-3">
                              </span>
                              <div class="media-body">
                                  <div class="row d-flex">
                                      <h6 class="user pt-2">{{ $comment->name }}</h6>
                                  </div>
                                  <div>
                                    <small>{{ $comment->diff_date }}</small>
                                  </div>
                                  <p class="text">
                                    {{ $comment->message }}
                                  </p>
                              </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif

          <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Leave a comment</h3>
            <form action="{{ route('comment.store') }}" method="POST" class="">
              @csrf
              <div class="form-row form-group">
                <input type="hidden" class="form-control" name="blog_id" value="{{ $blog->id }}">
                <div class="col-md-6">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-md-6">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="8" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Post Comment" class="btn btn-primary">
              </div>
  
            </form>
          </div>
        </div>
        <!-- sidebar -->
        @include('user.layouts.sidebar')
        <!-- and sidebar -->
      </div> <!-- .row -->
    </div> <!-- .container -->
  </div> <!-- .page-section -->

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