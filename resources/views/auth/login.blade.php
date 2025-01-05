<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Poppins:wght@400;600;800&display=swap');

    * {
      font-family: "Montserrat";
      font-weight: 500;
      margin: 0;
      padding: 0;
      box-sizing: border-box;

    }

    body {
      background-color: #ffffff;
      overflow-x: hidden;
    }

    .card {
      border: 0;
    }

    .side-left {
      height: 100vh;
      line-height: 100vh;
    }

    .box-welcome {
      padding: 50px;
      display: inline-block;
      vertical-align: middle;
      line-height: 1.5em;
      margin: 0 auto;
      float: none;
      width: 100%;
    }

    .welcome {
      font-size: 2rem;
      color: white;
      font-weight: 600;
    }

    .description {
      color: white;
      font-size: 16px
    }

    .side-left {
      background-image: url({{ asset('img/login.png')}});    
      background-size: cover;
    }


    @media only screen and (max-width: 450px) {
      .side-left {
        display: none;
      }
    }

    .login {
      text-align: center;
      margin-top: 10vh;
      font-weight: 600;
      color: #67666e;
    }

    .box-form {
      padding: 50px 120px 50px 120px;
    }

    .form-control:focus {
      border-color: #007aff;
      box-shadow: none;

    }

    .submit-login {
      margin-top: 40px;
    }

    .forgot-password {
      color: #67666e;
    }

    .button-login {
      border: none;
      background-color: #007aff;
      color: white;
      padding: 10px 35px 10px 35px;
      border-radius: 4px;
    }

    .line {
      margin-top: 80px;
    }

    .create-account {
      text-align: center;
      color: #74788d;
      font-size: 16px;
    }

    .input-group-append {
      margin-left: -1px;
    }

    .input-group-append,
    .input-group-prepend {
      display: flex;
    }

    .auth-form-v3__password-toggle {
      background-color: #fff;
      color: #757575;
      border: 1px solid #d4d4d8;
      border-left: 0;
      padding: 0px 15px 0px 15px;
      outline: 1px solid transparent;
      outline-offset: -4px;
      border-radius: 2px;
    }

    .auth-form-v3__password-input {
      border-right: 0 !important;
    }


    @media only screen and (max-width: 450px) {
      .box-form {
        padding: 35px 15px 35px 15px;
      }
    }
  </style>
</head>

<body>


  <main>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 side-left ">
          <div class="box-welcome">
            <h3 class="welcome">Wisata Alam Pantai Menganti</h3>
            <p class="description">
            </p>
          </div>
        </div>

        <div class="col-md-6  side-right">
          <h2 class="login">Login</h2>
          <div class="box-form">
            <form method="POST" action="{{ route('login') }}" id="form-login">
              @csrf
              <div class="form-group">
                <input id="email" type="email" class="form-control " name="email" value="" required autocomplete="email"
                  autofocus placeholder="Email">
                  <p class="text-danger">{{ $errors->first('email') }}</p>
              </div>

              <div class="form-group">
                <div class="input-group mb-3">

                  <input id="password" type="password" class="form-control auth-form-v3__password-input "
                    name="password" required autocomplete="current-password" placeholder="Password">

                  <div class="input-group-append">
                    <button class="auth-form-v3__password-toggle js-password-visibility-toggle" type="button"
                      data-password-visible="0">
                      <i class="far js-btn-password-toggle__icon fa-eye"></i>
                    </button>
                  </div>
                  
                </div>
                <p class="text-danger">{{ $errors->first('password') }}   </p>

              </div>

              <div class="form-group submit-login">
                <a class="forgot-password" href="{{ route('password.request') }}">
                  Lupa Password?
                </a>

                <button type="submit" class="button-login float-right btn-submit">
                  Login
                </button>

              </div>

              <hr class="line">
              <p class="create-account">
                Belum punya akun? <a href="{{ route('register') }}" class="signup">Registrasi</a>
              </p>


            </form>
          </div>
        </div>

      </div>
    </div>

  </main>




  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
  </script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    $('.js-btn-password-toggle__icon').click(function() {
            if ('password' == $('#password').attr('type')) {
                $('#password').prop('type', 'text');
                $('.js-btn-password-toggle__icon').addClass('fa-eye-slash')
                $('.js-btn-password-toggle__icon').removeClass('fa-eye')
            } else {
                $('#password').prop('type', 'password');
                $('.js-btn-password-toggle__icon').removeClass('fa-eye-slash')
                $('.js-btn-password-toggle__icon').addClass('fa-eye')
            }
        })
        $(document).ready(function() {
            $(".btn-submit").click(function() {
                // disable button
                $(this).prop("disabled", true);
                // add spinner to button
                $(this).html(
                    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait...`
                );
                $("#form-login").submit();
            });
        });
  </script>
</body>

</html>
