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
                <li class="{{ \Illuminate\Support\Facades\Request::is('/') ? 'active' : null }}"><a href="{{ url('/') }}">Home</a></li>
                <li class="{{ \Illuminate\Support\Facades\Request::is('help') ? 'active' : null }}"><a href="{{ url('/help') }}">Help</a></li>
                <li class="{{ \Illuminate\Support\Facades\Request::is('achievements') ? 'active' : null }}"><a href="{{ url('/achievements') }}">Achievements</a></li>
                @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->access =="admin")
                <li class="{{ \Illuminate\Support\Facades\Request::is('messages') ? 'active' : null }}"><a href="{{ url('/messages') }}">Messages</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">

                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Hello, <strong>{{\Illuminate\Support\Facades\Auth::user()->name}}!</strong> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if(\Illuminate\Support\Facades\Auth::user()->access == "student")
                            <li class="{{ \Illuminate\Support\Facades\Request::is('messages/'.
                            \Illuminate\Support\Facades\Auth::user()->id) ? 'active' : null }}"><a href="/messages/{{ \Illuminate\Support\Facades\Auth::user()->id }}">Check Message</a></li>
                            @endif

                            @if(\Illuminate\Support\Facades\Auth::user()->access == "admin")
                            <li class="{{ \Illuminate\Support\Facades\Request::is('students/create') ? 'active' : null }}"><a href="/students/create">Create Student Account</a></li>
                            <li class="{{ \Illuminate\Support\Facades\Request::is('messages') ? 'active' : null }}"><a href="/messages">Check Messages</a></li>
                            @endif

                            <li role="separator" class="divider"></li>
                            <li>
                                <form method="POST" action="{{ url('/logout') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="{{ \Illuminate\Support\Facades\Request::is('login') ? 'active' : null }}">
                        <a href="/login">Login</a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
