<div class="page-section bg-light">
  <div class="container">
    <h1 class="text-center wow fadeInUp">{{ __('Latest News') }}</h1>
    <div class="row mt-5">
      @if (!empty('blogs'))
        @foreach ($blogs as $blog)
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <div class="post-category">
                <a href="#">{{ $blog->category_name }}</a>
              </div>
              <a href="{{ route('news.detail', ['slug' => $blog->slug]) }}" class="post-thumb">
                <img src="{{ 'images/blogs/' . $blog->image }}" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="{{ route('news.detail', ['slug' => $blog->slug]) }}" tabindex="0" data-bs-toggle="tooltip" title="{{ $blog->name }}">{{ $blog->name }}</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="../assets/img/person/person_1.jpg" alt="">
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
      <div class="col-12 text-center mt-4 wow zoomIn">
        <a href="{{ route('news') }}" class="btn btn-primary">{{ __('Read More') }}</a>
      </div>

    </div>
  </div>
</div> <!-- .page-section -->