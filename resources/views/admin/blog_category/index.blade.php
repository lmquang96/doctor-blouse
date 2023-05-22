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
              <h3 class="page-title"> Blog Categories Management </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Blog Category</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
              </nav>
            </div>
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Blog Categories List</h4>
                      <div class="create-new-data-button">
                        <a class="badge crud-link badge-outline-success" href="{{ route('blogCategory.create') }}">New</a>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </th>
                            <th> Name </th>
                            <th> Status </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          @if (!empty($categories))
                            @foreach ($categories as $category)
                            <tr>
                              <td>
                                <div class="form-check form-check-muted m-0">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                  </label>
                                </div>
                              </td>
                              <td> {{ $category->name }} </td>
                              <td> <label class="badge {{ $category->status == 'show' ? 'badge-success' : 'badge-danger' }}">{{ $category->status }}</label> </td>
                              <td>
                                <a href="{{ route('doctor.edit', ['id' => $category->id]) }}" class="badge crud-link badge-outline-warning">Edit</a>
                                <form action="{{ route('doctor.destroy', ['id' => $category->id]) }}" method="POST" id="doctor-delete-form" class="d-inline">
                                  @csrf
                                  @method('delete')
                                  <button class="badge crud-link badge-outline-danger" onclick="handleDeleteSpecialty(event)">Delete</button>
                                </form>
                              </td>
                            </tr>
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                    </div>
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
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/admin/assets/js/off-canvas.js"></script>
    <script src="/admin/assets/js/hoverable-collapse.js"></script>
    <script src="/admin/assets/js/misc.js"></script>
    <script src="/admin/assets/js/settings.js"></script>
    <script src="/admin/assets/js/todolist.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
    <script>
      function handleDeleteSpecialty(e) {
        e.preventDefault();
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $("#doctor-delete-form").submit();
          }
        })
      }

      $(document).ready(function() {
        let session = '{{ session()->has('message') ? session()->get('message') : '' }}';
        if (session.length > 0) {
          Swal.fire(
            'Done!',
            session,
            'success'
          )
        }
      });
    </script>
  </body>
</html>