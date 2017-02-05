<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page-title', 'CS3226 Lab')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- child specific stylesheets -->
    @yield('stylesheet')

    <link rel="stylesheet" href="{{ url(asset('css/all.css')) }}"/>

</head>
<body class="flex-center position-ref full-height">
    @include('includes.header')

    @include('includes.nav')

    <main>
        @yield('content')

        <hr/>

        @include('includes.footer')
    </main>

</body>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- child specific scripts -->
@yield('script')

</html>
