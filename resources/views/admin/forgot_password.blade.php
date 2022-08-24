<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{asset('admin/images/logo.svg')}}" alt="logo">
              </div>
              <h4>mot de passe oublié</h4>
             
              @if(Session::has('error_message'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>error</strong> {{Session::get('error_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              
              @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>error</strong> {{Session::get('error_message')}}
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </ul>
    </div>
@endif
              <form class="pt-3" action="{{url('admin/new_password')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">enter your email </label>
                    <input type="email" name="email" id="email"  class="form-control form-control-lg" id="exampleInputName" placeholder="Email"  required=''>
                  </div>
               
                <div class="form-group">
                    <label for="password">enter your new password </label>
                  <input type="password" name="password" id="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required=''>
                </div>
                
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"> reinitialiser mot de passe  </button>
            
               
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
  <!-- plugins:js -->
  <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>