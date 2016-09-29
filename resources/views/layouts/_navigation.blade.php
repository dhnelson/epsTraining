<div class="navbar-style">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>               
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ url('images/gorilla.jpg') }}" class="img-responsive" alt="gorilla logo">
                </a>
            </div>
            
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('/') ? "active" : ""}}"><a href="{{ route('home') }}">Home</a></li> 
                    <li class="dropdown {{ Request::is('king', 'team', 'facility', 'photos') ? "active" : ""}}"><a class="dropdown-toggle" data-toggle="dropdown" href="#">About EPS <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ route('king') }}">The King</a></li> 
                          <li><a href="{{ route('team') }}">The Team</a></li>
                          <li><a href="{{ route('facility') }}">Facility</a></li>
                          <li><a href="{{ route('photos') }}">Photos</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('services') ? "active" : ""}}"><a href="{{ route('services') }}">Services</a></li>
                    <li class="{{ Request::is('testimonials') ? "active" : ""}}"><a href="{{ route('testimonials') }}">Testimonials</a></li>
                    <li class="{{ Request::is('contact') ? "active" : ""}}"><a href="{{ route('contact') }}">Contact</a></li>
                    </li>
                    <li class="{{ Request::is('blog') ? "active" : ""}}"><a href="{{ route('blog') }}">Blog</a></li>
                </ul>
                
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="{{ Request::is('login') ? "active" : ""}}"><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <li class="{{ Request::is('register') ? "active" : ""}}"><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-edit"></span> Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('comments.index') }}">Your Comments</a></li>
                                @if (auth()->user()->isAdmin())
                                <li><a href="{{ route('posts.index') }}">Blog Posts</a></li>
                                <li><a href="{{ route('categories.index') }}">Categories</a></li>
                                <li><a href="{{ route('tags.index') }}">Tags</a></li>
                                <li class="divider"></li>
                                @endif
                                <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>