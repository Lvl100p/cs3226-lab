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

</head>
<body class="container-fluid full-height">

 <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <div class="fb-like" 
    data-href="http://www.your-domain.com/your-page.html" 
    data-layout="standard" 
    data-action="like" 
    data-show-faces="true">
  </div>

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

</html>
