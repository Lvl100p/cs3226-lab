<!-- navigation bar-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">@yield('content-title')</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ \Illuminate\Support\Facades\Request::is('/') ? 'active' : null }}"><a href="{{ url('/') }}"> {{trans('lang.Home')}}</a></li>
                <li class="{{ \Illuminate\Support\Facades\Request::is('help') ? 'active' : null }}"><a href="{{ url('/help') }}">{{ trans('lang.Help')}}</a></li>
                <li class="{{ \Illuminate\Support\Facades\Request::is('achievements') ? 'active' : null }}"><a href="{{ url('/achievements') }}">{{ trans('lang.Achievements')}}</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{ Config::get('app.locales')[App::getLocale()] }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach (Config::get('app.locales') as $lang => $locale)
                        @if ($lang != App::getLocale())
                        <li>
                            <a href="{{ route('lang.change', $lang)}}">{{$locale}}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </li>

                @if(\Illuminate\Support\Facades\Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Hello, <strong>{{\Illuminate\Support\Facades\Auth::user()->name}}!</strong> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ \Illuminate\Support\Facades\Request::is('students/create') ? 'active' : null }}"><a href="students/create">Create Student Account</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <form method="POST" action="{{ url('/logout') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="col-md-offset-7 col-md-5">
                                        <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                    <li class="{{ \Illuminate\Support\Facades\Request::is('login') ? 'active' : null }}">
                        <a href="/login">{{ trans('lang.Login')}}</a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
