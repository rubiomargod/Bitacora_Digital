<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('CSS/Normalize.css') }}">
  <link rel="stylesheet" href="{{ asset('CSS/App.css') }}">
  @livewireStyles
</head>

<body>
  @include('Components.Menu')
  <div class="container-fluid" style="margin-left: auto;">
    @yield('body')
  </div>
  @livewireScripts
  @stack('scripts')
  <script src="https://cdn.jsdelivr.net/npm/luxon@3"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon"></script>
</body>

</html>