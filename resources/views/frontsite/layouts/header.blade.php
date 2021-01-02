<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="images/logo.png" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item @yield('home')"><a class="nav-link" href="{{route('frontsite.home')}}">Home</a></li>
                    <li class="nav-item @yield('menufood')"><a class="nav-link" href="{{route('frontsite.menufood')}}">Menu</a></li>
                    <li class="nav-item @yield('about')"><a class="nav-link" href="{{route('frontsite.about')}}">About</a></li>
                    <li class="nav-item dropdown @yield('pages')">
                        <a class="nav-link dropdown-toggle " href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu " aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="{{route('frontsite.reservation')}}">Reservation</a>
                            <a class="dropdown-item" href="{{route('frontsite.stuff')}}">Stuff</a>
                            <a class="dropdown-item" href="{{route('frontsite.gallery')}}">Gallery</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown @yield('blog')">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="{{route('frontsite.blog')}}">blog</a>
                            <a class="dropdown-item" href="{{route('frontsite.blogdetails')}}">blog Single</a>
                        </div>
                    </li>
                    <li class="nav-item @yield('contact')"><a class="nav-link" href="{{route('frontsite.contact')}}">Contact</a></li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Login <span
                                    class="sr-only">(current)</span></a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard.home')}}">Dashboard <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('logout')}}">Logout <span class="sr-only">(current)</span></a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->
