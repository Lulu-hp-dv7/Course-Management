<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield( 'title', 'Acceuil') | Welcome</title>

  <!-- Fonts -->

  <!-- Styles / Scripts -->
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
  @vite([
  'resources/css/app.css',
  'resources/js/app.js'
  ])
  @else
  @endif
</head>
<body class="bg-gradient-secondary">

    <div class="container">
        @yield('content')
    </div>
    
</body>

</html>