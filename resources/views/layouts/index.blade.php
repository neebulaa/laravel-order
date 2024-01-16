<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Laravel Orders | {{ $title }}</title>
</head>
<body>
    @auth
      <div class="d-flex">
        @include('partials.sidebar')
        <div class="p-5 w-100" style="height: 100vh; overflow-y: auto;">
            @yield('container')
        </div>
      </div>
    @else
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; width: 100%; max-width: 400px;">
      @yield('container')
    </div>
    @endauth
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 