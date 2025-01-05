<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="icon" href="{{asset('img/logo.png')}}">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  @yield('script')
  <style>
    * {
      font-family: 'Inter';
    }
  </style>

  @yield('style')
</head>

<body>

  @include('layouts.module.front.header')

  @yield('content')





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  @yield('js')
</body>

</html>
