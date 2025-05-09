<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Load your compiled Tailwind CSS & JS -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
  {{-- optional: your nav / header here --}}
  {{-- @include('layouts.navigation') --}}

  <main class="py-6">
    @yield('content')
  </main>
</body>
</html>