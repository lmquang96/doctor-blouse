<div class="page-section">
  <div class="container">
    <h1 class="text-center mb-5 wow fadeInUp">{{ __('Our Doctors') }}</h1>

    <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
      @if (!empty($doctors))
        @foreach ($doctors as $doctor)
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="{{ 'images/doctor/' . $doctor->image }}" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-lg mb-0">{{ __('Dr.') }} {{ $doctor->first_name . ' ' . $doctor->last_name }}</p>
              <span class="text-sm text-grey">{{ __($doctor->specialty_name) }}</span>
            </div>
          </div>
        </div>
        @endforeach
      @endif
    </div>
  </div>
</div>