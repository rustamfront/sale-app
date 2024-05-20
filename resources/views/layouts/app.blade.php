<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        @vite(['resources/css/app.css'])
    </head>
<body>

<div class="container">
    @yield('content')
</div>
@vite(['resources/js/app.js'])
</body>
</html>

