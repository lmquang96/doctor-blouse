<div class="page-section" id="appointment-form">
  <div class="container">
    <h1 class="text-center wow fadeInUp">{{ __('Make an Appointment') }}</h1>

    <form class="main-form" action="{{ route('appointment.store') }}" method="POST">
      @csrf
      <div class="row mt-5 ">
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <input type="text" class="form-control" placeholder="{{ __('First name') }}" name="first_name">
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <input type="text" class="form-control" placeholder="{{ __('Last name') }}" name="last_name">
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <input type="text" class="form-control" placeholder="{{ __('Email address..') }}" name="email">
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
          <select name="gender" id="gender" class="custom-select">
            <option value="" disabled selected>-- {{ __('Choose your gender') }} --</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
          <input type="date" class="form-control" name="date">
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
          <select name="department" id="department" class="custom-select">
            <option value="" disabled selected>-- {{ __('Choose a medical department') }} --</option>
            <option value="GEN">{{ __('General Health') }}</option>
            @if (!$specialties->isEmpty())
              @foreach ($specialties as $specialty)
              <option value="{{ $specialty->code }}">{{ __($specialty->name) }}</option>
              @endforeach
            @endif
          </select>
        </div>
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="text" class="form-control" placeholder="{{ __('Number..') }}" name="phone">
        </div>
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <textarea name="message" id="message" class="form-control" rows="6" placeholder="{{ __('Enter message..') }}" name="message"></textarea>
        </div>
      </div>

      <button type="submit" class="btn btn-primary mt-3 wow zoomIn">{{ __('Submit Request') }}</button>
    </form>
  </div>
</div> <!-- .page-section -->