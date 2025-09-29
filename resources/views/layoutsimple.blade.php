<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>
  body {
    font-family: 'Nunito', sans-serif;
  }
    .home-container {
        height: 100vh;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
  </style>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield( 'title', 'Acceuil') | Emplois du temps</title>

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

<body id="page-top">
  <div id="app">
    @yield('content')
  </div>
</body>
</html>