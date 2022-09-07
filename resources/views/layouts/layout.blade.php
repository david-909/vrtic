<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.head')

</head>

<body>
    @include('inc.nav')
    @yield('content')
    <footer>
        @include('inc.footer')
    </footer>

    @extends('inc.scripts')
</body>

</html>
