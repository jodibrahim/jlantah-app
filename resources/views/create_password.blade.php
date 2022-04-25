
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Create Password | J-LANTAH</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset ('/assets/img/brand/favicon.png')}}" type="image/png">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset ('/assets/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset ('/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset ('/assets/css/argon.css?v=1.2.0')}}" type="text/css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style type="text/css">
    .swal-footer {
    text-align: center;
  }
  </style>
</head>

<body class="bg-default" style="background-color: #609948   !important;">
  
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h3 class="text-lead text-white">Silakan buat password untuk akun hub Anda !</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form class="form-horizontal" method="post" id="create_form"  enctype="multipart/form-data">
                @csrf
                <center>
                <img src="{{asset ('assets/img/logo.png')}}"  style="width: 40%; height: 40%;">
                </center>
                <br>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password" id="password" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Konfirmasi Password" type="password" name="re_password" id="re_password" required>
                  </div>
                </div>
                <div id="notif">
                  <div class="alert alert-danger" role="alert">
                    Kombinasi password tidak sesuai !
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4" onclick="return validate()">Buat Password</button>
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            <span style="color:#fff">&copy; 2021 </span><a href="#" class="font-weight-bold ml-1" target="_blank" style="color:#fff">Developed By Inovatiz</a>
          </div>
        </div>
        
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset ('/assets/js/jquery.min.js')}}"></script>
  <script src="{{asset ('/assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset ('/assets/js/js.cookie.js')}}"></script>
  <script src="{{asset ('/assets/js/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset ('/assets/js/jquery-scrollLock.min.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset ('/assets/js/argon.js?v=1.2.0')}}"></script>

  <script type="text/javascript">

    $('#notif').hide();
    let searchParams = new URLSearchParams(window.location.search);

    function validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("re_password").value;
        if (password != confirmPassword) {
            $('#notif').show();
            return false;
        }
        return true;
    }

    $(document).ready(function () {
            
            $('#create_form').on('submit', function(event){
                event.preventDefault();
                var _token = $("input[name='_token']").val();
                var verify_token = searchParams.get('token');
                var password = $("input[name='password']").val();

                $.ajax({
                    url: "../../activateHub",
                    type: "PUT",
                    data: { _token: _token, verify_token: verify_token, password: password },
                    success: function (data) {
                        
                        if(data.status==='success') {
                        swal("Sukses!", "Password berhasil dibuat!", "success").then(function() {
                          window.location = "../../activationSuccess";
                        });  
                        } else {
                           swal("Gagal!", ""+data.message+"", "error")
                        }
                    },
                });
                
            });
        });

    


  </script>


</body>

</html>