<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('shopbase/css/app.css') }}">
    <script src="{{ asset('shopbase/js/app.js') }}"></script>
    <title>@yield('title')</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>