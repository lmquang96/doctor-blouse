<header>
  <div class="topbar">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 text-sm">
          <div class="site-info">
            <a href="#"><span class="mai-call text-primary"></span> +44 1632 960097</a>
            <span class="divider">|</span>
            <a href="#"><span class="mai-mail text-primary"></span> doctorblouse@gmail.com</a>
          </div>
        </div>
        <div class="col-sm-4 text-right text-sm d-flex justify-content-end align-items-center">
          <div>
            <div class="btn-group">
              <button class="btn btn-sm dropdown-toggle language-select" type="button" data-toggle="dropdown" aria-expanded="false">
                <div class="d-inline-flex align-items-center">
                  <span class="flag-icon mr-2 {{ Config::get('app.locale') == 'en' ? 'flag-icon-en' : 'flag-icon-vi' }}"></span> {{ Config::get('app.locale') == 'en' ? 'English' : 'Tiếng Việt' }}
                </div>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('home.change-language', ['language' => 'en']) }}">
                  <div class="d-flex align-items-center">
                    <span class="flag-icon flag-icon-en mr-2"></span> English
                  </div>
                </a>
                <a class="dropdown-item" href="{{ route('home.change-language', ['language' => 'vi']) }}">
                  <div class="d-flex align-items-center">
                    <span class="flag-icon flag-icon-vi mr-2"></span> Tiếng Việt
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="social-mini-button ">
            <a href="#"><span class="mai-logo-facebook-f"></span></a>
            <a href="#"><span class="mai-logo-twitter"></span></a>
            <a href="#"><span class="mai-logo-dribbble"></span></a>
            <a href="#"><span class="mai-logo-instagram"></span></a>
          </div>
        </div>
      </div> <!-- .row -->
    </div> <!-- .container -->
  </div> <!-- .topbar -->

  <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="/"><span class="text-primary">Doctor</span>-Blouse</a>

      <form action="{{ route('news.search') }}" method="GET" id="searchForm">
        <div class="input-group input-navbar">
          <div class="input-group-prepend cursor-pointer" onclick="$('#searchForm').submit()">
            <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
          </div>
          <input type="text" class="form-control" placeholder="{{ __('Enter keyword..') }}" aria-label="search" aria-describedby="icon-addon1" name="q">
        </div>
      </form>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupport">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item{{ request()->is('/') ? ' active' : '' }}">
            <a class="nav-link" href="/">{{ __('Home') }}</a>
          </li>
          <li class="nav-item{{ request()->is('about-us') ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('about-us') }}">{{ __('About Us') }}</a>
          </li>
          <li class="nav-item{{ request()->is('doctors') ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('doctors') }}">{{ __('Doctors') }}</a>
          </li>
          <li class="nav-item{{ request()->is('news*') ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('news') }}">{{ __('News') }}</a>
          </li>
          <li class="nav-item{{ request()->is('contact') ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('contact') }}">{{ __('Contact') }}</a>
          </li>
          
          @if (Route::has('login'))
          @auth

          Hi, {{ auth()->user()->name }}

          @else
          
          <li class="nav-item">
            <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">{{ __('Sign In') }}</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
          </li>

          @endauth
          @endif

        </ul>
      </div> <!-- .navbar-collapse -->
    </div> <!-- .container -->
  </nav>
</header>