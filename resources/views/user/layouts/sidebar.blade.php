<div class="col-lg-4">
  <div class="sidebar">
    <div class="sidebar-block">
      <h3 class="sidebar-title">Search</h3>
      <form action="{{ route('news.search') }}" method="GET" class="search-form">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Type a keyword and hit enter" name="q" value="{{ $originalString ?? '' }}">
          <button type="submit" class="btn"><span class="icon mai-search"></span></button>
        </div>
      </form>
    </div>
    <div class="sidebar-block">
      <h3 class="sidebar-title">Categories</h3>
      <ul class="categories">
        @if (!empty($categories))
          @foreach ($categories as $category)
          <li><a href="{{ route('news.category', ['slug' => $category->slug]) }}">{{ $category->name }} <span>{{ ($category->count < 10 ? '0' : '') . ($category->count > 99 ? '99+' : $category->count) }}</span></a></li>
          @endforeach
        @endif
      </ul>
    </div>

    <div class="sidebar-block">
      <h3 class="sidebar-title">Recent Blog</h3>
      @if (!empty($recentBlog))
        @foreach ($recentBlog as $blog)
        <div class="blog-item">
          <a class="post-thumb" href="">
            <img src="{{ '/images/blogs/' . $blog->image }}" alt="">
          </a>
          <div class="content">
            <h5 class="post-title"><a href="{{ route('news.detail', ['slug' => $blog->slug]) }}" tabindex="0" data-bs-toggle="tooltip" title="{{ $blog->name }}">{{ $blog->name }}</a></h5>
            <div class="meta">
              <a href="#"><span class="mai-calendar"></span> {{ $blog->created_date_format }}</a>
              <a href="#"><span class="mai-person"></span> {{ $blog->author_name }}</a>
              <a href="#"><span class="mai-chatbubbles"></span> {{ $blog->comments_count }}</a>
            </div>
          </div>
        </div>
        @endforeach
      @endif
    </div>

    <div class="sidebar-block">
      <h3 class="sidebar-title">Tag Cloud</h3>
      <div class="tagcloud">
        @if (!empty($tagList))
          @foreach ($tagList as $tag)
          <a href="{{ route('news.tag', ['tag' => $tag]) }}" class="tag-cloud-link">{{ $tag }}</a>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</div> 