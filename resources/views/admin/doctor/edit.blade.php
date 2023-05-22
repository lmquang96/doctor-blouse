<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/admin/assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/admin/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/admin/assets/css/style.css">
    <link rel="stylesheet" href="/admin/assets/css/custom.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/admin/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- sidebar -->
      @include('admin.layouts.sidebar')
      <!-- end sidebar -->
      <div class="container-fluid page-body-wrapper">
        <!-- navbar -->
        @include('admin.layouts.navbar')
        <!-- end navbar -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Edit Doctor </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Doctor's Information</h4>
                    <form action="{{ route('doctor.update', ['id' => $doctor->id]) }}" method="POST" enctype="multipart/form-data" class="form-sample">
                      @csrf
                      @method('PUT')
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="first_name" value="{{ $doctor->first_name }}" />
                              <x-input-error for="first_name" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="last_name"  value="{{ $doctor->last_name }}" />
                              <x-input-error for="last_name" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="gender">
                                <option disabled selected>-- Choose gender --</option>
                                <option value="male"{{ $doctor->gender == 'male' ? ' selected' : '' }}>Male</option>
                                <option value="female"{{ $doctor->gender == 'female' ? ' selected' : '' }}>Female</option>
                                <option value="other"{{ $doctor->gender == 'other' ? ' selected' : '' }}>Other</option>
                              </select>
                              <x-input-error for="gender" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="date_of_birth" placeholder="dd/mm/yyyy" value="{{ $doctor->date_of_birth }}" />
                              <x-input-error for="date_of_birth" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="email" value="{{ $doctor->email }}" />
                              <x-input-error for="email" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="image" value="{{ $doctor->image }}" />
                              <x-input-error for="image" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="address" value="{{ $doctor->address }}" />
                              <x-input-error for="address" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="phone" value="{{ $doctor->phone }}" />
                              <x-input-error for="phone" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Province/City/State</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="province_or_city" value="{{ $doctor->province_or_city }}" />
                              <x-input-error for="province_or_city" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Country</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="country">
                                <option disabled selected>-- Choose county --</option>
                                <option value="Vietnamese"{{ $doctor->country == 'Vietnamese' ? ' selected' : '' }}>Vietnamese</option>
                                <option value="United States"{{ $doctor->country == 'United States' ? ' selected' : '' }}>United States</option>
                                <option value="Italy"{{ $doctor->country == 'Italy' ? ' selected' : '' }}>Italy</option>
                                <option value="Russia"{{ $doctor->country == 'Russia' ? ' selected' : '' }}>Russia</option>
                                <option value="Britain"{{ $doctor->country == 'Britain' ? ' selected' : '' }}>Britain</option>
                              </select>
                              <x-input-error for="country" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Room</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="room" value="{{ $doctor->room }}" />
                              <x-input-error for="room" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Specialty</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="specialty">
                                <option disabled selected>-- Choose specialty--</option>
                                @if (!empty($specialties))
                                  @foreach ($specialties as $specialty)
                                  <option value="{{ $specialty->code }}">{{ $specialty->name }}</option>
                                  @endforeach
                                @endif
                              </select>
                              <x-input-error for="specialty" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/admin/assets/vendors/select2/select2.min.js"></script>
    <script src="/admin/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/admin/assets/js/off-canvas.js"></script>
    <script src="/admin/assets/js/hoverable-collapse.js"></script>
    <script src="/admin/assets/js/misc.js"></script>
    <script src="/admin/assets/js/settings.js"></script>
    <script src="/admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/admin/assets/js/file-upload.js"></script>
    <script src="/admin/assets/js/typeahead.js"></script>
    <script src="/admin/assets/js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>