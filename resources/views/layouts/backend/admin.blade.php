<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>{{$title}}</title>

    <link rel="icon" href="{{asset('gambar/icon.png')}}">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/heroes/">

    

    <!-- Bootstrap core CSS -->
{{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}


<style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
    
    <!-- Custom styles for this template -->
    <link href="sidebars.css" rel="stylesheet">
  </head>
  <body>
    
      @include('layouts.backend.sidebar')
      <main>
    <div>
        @yield('admin')
    </div>
</main>
<script src="sidebars.js"></script>
{{-- <script src="js/bootstrap.bundle.min.js"></script> --}}

  
</body>
</html>
