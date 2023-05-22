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
              <h3 class="page-title"> Detail Appointment </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Appointment</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Appointment's Information</h4>
                    <form action="" method="POST" enctype="multipart/form-data" class="form-sample">
                      @csrf
                      @method('PUT')
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">First Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="first_name" value="{{ $appointment->first_name }}" readonly />
                              <x-input-error for="first_name" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Last Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="last_name"  value="{{ $appointment->last_name }}" readonly />
                              <x-input-error for="last_name" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="email" value="{{ $appointment->email }}" readonly />
                              <x-input-error for="email" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Gender</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="gender" value="{{ Str::ucfirst($appointment->gender) }}" readonly />
                                <x-input-error for="gender" class="mt-2 mb-0" />
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Date</label>
                              <div class="col-sm-8">
                                <input class="form-control" name="date" placeholder="dd/mm/yyyy" value="{{ $appointment->date }}" readonly />
                                <x-input-error for="date" class="mt-2 mb-0" />
                              </div>
                            </div>
                          </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Department</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="department" value="{{ Str::length($appointment->department_name) > 0 ? $appointment->department_name : 'General Health' }}" readonly />
                              <x-input-error for="department" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="phone" value="{{ $appointment->phone }}" readonly />
                              <x-input-error for="phone" class="mt-2 mb-0" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Status</label>
                              <div class="col-sm-8">
                                <select class="form-control" name="country">
                                  <option value="pending"{{ $appointment->status == 'pending' ? ' selected' : '' }}>Pending</option>
                                  <option value="in progress"{{ $appointment->status == 'in progress' ? ' selected' : '' }}>In Progress</option>
                                  <option value="complete"{{ $appointment->status == 'complete' ? ' selected' : '' }}>Complete</option>
                                  <option value="refuse"{{ $appointment->status == 'refuse' ? ' selected' : '' }}>Refuse</option>
                                </select>
                                <x-input-error for="country" class="mt-2 mb-0" />
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Message</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" id="exampleTextarea1" rows="4" readonly >{{ $appointment->message }}</textarea>
                                <x-input-error for="phone" class="mt-2 mb-0" />
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