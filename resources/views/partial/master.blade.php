<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @include('partial/css')
    @yield('customcss')
</head>

<body>
    
@include('partial/navbar')

@include('partial/sidenavbar')

@include('partial/extensionsidebar')

@include('partial/themechangepanel')

<!-- Main Content -->
<section class="main-section">

    @yield('container')

</section>
@include('partial/js')

@yield('customjs')
</body>

</html>