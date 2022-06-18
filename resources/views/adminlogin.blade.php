<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Agriculture Hub</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{!! asset('theam/vendors/typicons/typicons.css') !!}">
  <link rel="stylesheet" href="{!! asset('theam/vendors/css/vendor.bundle.base.css1') !!}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{!! asset('theam/css/vertical-layout-light/style.css') !!}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{!! asset('theam/images/logo.png') !!}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{!! asset('theam/images/logo.png') !!}" style="width:100px" alt="logo">
              </div>
              <h4>Agriculture Hub</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" action="/CheckAdminLogin" method="post">
                @csrf
                <div class="form-group">
                  <input type="email" name="t1" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="t2" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value='SIGN IN' >
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
              
                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{!! asset('theam/vendors/js/vendor.bundle.base.js') !!}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{!! asset('theam/js/off-canvas.js') !!}"></script>
  <script src="{!! asset('theam/js/hoverable-collapse.js') !!}"></script>
  <script src="{!! asset('theam/js/template.js') !!}"></script>
  <script src="{!! asset('theam/js/settings.js') !!}"></script>
  <script src="{!! asset('theam/js/todolist.js') !!}"></script>
  <!-- endinject -->
</body>

</html>
