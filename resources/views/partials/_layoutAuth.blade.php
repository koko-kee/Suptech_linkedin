<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Suptech LinkedIn</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.png')}}"/>
  <link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}"/>
</head>

<body>
 @yield('content')

  <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{'assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'}}"></script>
  <script>
    $(document).ready(function() {
        $('#customModal').modal('show');
    });
  </script>
</body>

</html>
