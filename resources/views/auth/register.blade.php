<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi</title>
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
      background-color: #007aff;
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
      background-image: url({{ asset('img/register.png')}});    
      background-size: cover;
    }

    @media only screen and (max-width: 450px) {
      .side-left {
        display: none;
      }
    }
  </style>
  <style>
    .signup {
      text-align: center;
      margin-top: 10vh;
      font-weight: 600;
      color: #67666e;
    }

    .box-signup {
      padding: 50px 25px 50px 25px;
    }

    label {
      color: #646c9a;
      font-size: 14px;
    }

    .btn {
      background-color: #007aff;
      color: white;
    }

    .btn:hover {
      color: white;
    }

    .form-control:focus {
      border-color: #007aff;
      box-shadow: none;

    }

    .line {
      margin-top: 30px;
    }

    .create-account {
      text-align: center;
      color: #74788d;
      font-size: 16px;
    }
  </style>
</head>

<body>


  <main>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 side-left ">
          <div class="box-welcome">
            <h3 class="welcome"> Wisata Alam Pantai Menganti</h3>
            <p class="description">
            </p>
          </div>
        </div>

        <div class="col-md-6 side-right">
          <h2 class="signup">Registrasi</h2>

          <div class="box-signup">
            <form method="POST" action="{{ route('register') }}" id="form-register">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input id="name" type="text" class="form-control " name="name" value="" required autocomplete="name"
                      autofocus>
                      <p class="text-danger">{{ $errors->first('name') }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control " name="email" value="" required
                      autocomplete="email">
                      <p class="text-danger">{{ $errors->first('email') }}</p>
                  </div>
                </div>
              </div>



              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control " name="password" required
                      autocomplete="new-password">
                      <p class="text-danger">{{ $errors->first('password') }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="confirm-password">Confirm Password</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    required autocomplete="new-password">
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn  btn-block mt-3 btn-submit ">
                  Register
                </button>

              </div>

            </form>


            <hr class="line">
            <p class="create-account">
              Sudah punya akun? <a href="{{ route('login') }}" href="login">Login</a>
            </p>

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
    $(document).ready(function() {
            $(".btn-submit").click(function() {
                // disable button
                $(this).prop("disabled", true);
                // add spinner to button
                $(this).html(
                    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait...`
                );
                $("#form-register").submit();
            });
        });
  </script>
</body>

</html>
