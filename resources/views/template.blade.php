<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page-title', 'CS3226 Lab')</title>

    <!-- Styles -->
    {{ Html::style('css/bootstrap.css') }}
    {{ Html::style('css/bootstrap-callout.css') }}

    <!-- child specific stylesheets -->
    @yield('stylesheet')

    {{ Html::style('css/custom.css') }}

    <!-- Used for facebook like -->
    <meta property="og:url" content=""/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="(The best) CS3226 Ranklist"/>
    <meta property="og:description" content="The best implemented CS3226 ranklist ever yet."/>
    <meta property="og:image"
          content="http://ghk.h-cdn.co/assets/16/09/980x490/landscape-1457107485-gettyimages-512366437.jpg"/>
</head>
<body class="container-fluid full-height">

<div id="fb-root"></div>
<div class="row">
    <div class="col-md-12">
        @include('includes.nav')
    </div>
</div>

<div class="row">

    <main class="col-md-offset-1 col-md-10 col-md-offset-1">

        @yield('content')

    </main>
</div>

<div class="row">
    <div class="col-md-offset-1 col-md-10 col-md-offset-1">
        <hr/>
        @include('includes.footer')
    </div>
</div>

</body>


{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js') }}
{{ Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}

<!-- child specific scripts -->
@yield('script')
<script>
    window.fbAsyncInit = function () {
        FB.init({
            status: true, // check login status
            cookie: true, // enable cookies to allow the server to access the session
            xfbml: true  // parse XFBML
        });
    };

    // Load the SDK Asynchronously
    (function (d) {
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement('script');
        js.id = id;
        js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
    }(document));
</script>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

</html>
