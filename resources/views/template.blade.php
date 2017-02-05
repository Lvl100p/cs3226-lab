<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page-title', 'CS3226 Lab')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css">

    <!-- child specific stylesheets -->
    @yield('stylesheet')

    <link rel="stylesheet" href="{{ url(asset('css/all.css')) }}"/>

</head>
<body class="flex-center position-ref full-height">
    @include('includes.header')

    @include('includes.nav')

    <main>
        @yield('content')
    </main>

    @include('includes.footer')
</body>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>

<!-- child specific scripts -->
@yield('script')

<script type="text/javascript" src="{{ url(asset('js/all.js')) }}"></script>

</html>
