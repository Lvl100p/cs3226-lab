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
                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/help') }}">Help</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Hello, <strong>{{\Illuminate\Support\Facades\Auth::user()->name}}!</strong> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="students/create">Create Student Account</a></li>
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
                    <li>
                        <a href="/login">Login</a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>