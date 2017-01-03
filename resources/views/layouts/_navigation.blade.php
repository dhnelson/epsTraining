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
                    <li class="{{ Request::is('/') ? "active" : ""}}"><a href="{{ route('home') }}">HOME</a></li> 
                    <li class="dropdown {{ Request::is('king', 'team', 'facility', 'pics') ? "active" : ""}}"><a class="dropdown-toggle" data-toggle="dropdown" href="#">ABOUT EPS <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a id="myDropdown" href="{{ route('king') }}">The King</a></li> 
                          <li><a id="myDropdown" href="{{ route('team') }}">The Team</a></li>
                          <li><a id="myDropdown" href="{{ route('facility') }}">Facility</a></li>
                          {{--<li><a id="myDropdown" href="{{ route('testimonials') }}">Testimonials</a></li>--}}
                          <li><a id="myDropdown" href="{{ route('pics') }}">Pictures</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('services') ? "active" : ""}}"><a href="{{ route('services') }}">SERVICES</a></li>
                    <li class="{{ Request::is('contact') ? "active" : ""}}"><a href="{{ route('contact') }}">CONTACT</a></li>
                    </li>
                    <li class="dropdown {{ Request::is('instafeed', 'blog') ? "active" : ""}}"><a class="dropdown-toggle" data-toggle="dropdown" href="#">EPS NEWS<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a id="myDropdown" href="{{ route('instafeed') }}">InstaFeed</a></li> 
                          <li><a id="myDropdown" href="{{ route('blog.index') }}">Blog</a></li>
                        </ul>
                    </li>
                    <li><a href="https://squareup.com/store/traineps/" target="_blank">STORE</a></li>
                </ul>
                
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="{{ Request::is('login') ? "active" : ""}}"><a data-toggle="modal" data-target="#myModalLogin"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>

                        <li class="{{ Request::is('register') ? "active" : ""}}"><a data-toggle="modal" data-target="#myModalRegister"><span class="glyphicon glyphicon-edit"></span> REGISTER</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a id="myDropdown" href="{{ route('comments.index') }}">Your Comments</a></li>
                                @if (auth()->user()->isAdmin())
                                <li><a id="myDropdown" href="{{ route('posts.index') }}">Blog Posts</a></li>
                                <li><a id="myDropdown" href="{{ route('categories.index') }}">Categories</a></li>
                                <li><a id="myDropdown" href="{{ route('tags.index') }}">Tags</a></li>
                                <li><a id="myDropdown" href="{{ route('contact.emailSubscribers') }}">Email Subscribers</a></li>                              
                                <li class="divider"></li>
                                @endif
                                <li><a id="myDropdown" href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>

@include('layouts._modal_login')
@include('layouts._modal_register')
