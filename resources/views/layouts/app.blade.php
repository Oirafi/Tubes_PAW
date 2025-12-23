<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'TemuBarang')</title>

    {{-- GLOBAL CSS --}}
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/temubarang.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">


    {{-- CSS KHUSUS HALAMAN --}}
    @stack('styles')
</head>

<body>

@include('partials.navbar')

@yield('content')

@include('partials.footer')

{{-- SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('profileToggle');
    const menu = document.getElementById('profileMenu');

    if (toggle && menu) {
        toggle.addEventListener('click', function (e) {
            e.stopPropagation();
            menu.classList.toggle('show');
        });

        document.addEventListener('click', function () {
            menu.classList.remove('show');
        });
    }
});
</script>

</body>
</html>