<header id="header">
    <!-- Navbar -->
    <nav data-aos="zoom-out" data-aos-delay="800" class="navbar navbar-expand">
        <div class="container header">
            <!-- Navbar Brand-->
            <a class="navbar-brand" href="/">
                <img class="navbar-brand-regular" src="{{ asset('assets/img/logo/logo-white.png') }}" alt="brand-logo">
                <img class="navbar-brand-sticky" src="{{ asset('assets/img/logo/logo.png') }}" alt="sticky brand-logo">
            </a>
            <div class="ml-auto"></div>
            <!-- Navbar -->
            <ul class="navbar-nav items">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('posts.index') }}" class="nav-link">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('authors.index') }}" class="nav-link">Authors</a>
                </li>
                @auth
                <li class="nav-item">
                    <a href="{{ route('posts.create') }}" class="nav-link">Create Post</a>
                </li>
                @if(auth()->user()->hasRole('admin'))
                <li class="nav-item">
                    <a href="{{ route('categories.create') }}" class="nav-link">Create Category</a>
                </li>
                    @endif
                @endauth
                @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </li>
                @endguest
                @auth
                <li class="nav-item">
                    <a href="#" onclick="document.querySelector('#logout').submit()" class="nav-link">Logout</a>
                </li>
                @endauth
            </ul>
            <form action="{{route('logout')}}" method="Post" id="logout">
                @csrf
            </form>
            <!-- Navbar Icons -->
            <ul class="navbar-nav icons">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#search">
                        <i class="fas fa-search"></i>
                    </a>
                </li>
                <li class="nav-item social">
                    <a href="#" class="nav-link"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="nav-item social">
                    <a href="#" class="nav-link"><i class="fab fa-twitter"></i></a>
                </li>
            </ul>

            <!-- Navbar Toggler -->
            <ul class="navbar-nav toggle">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#menu">
                        <i class="fas fa-bars toggle-icon m-0"></i>
                    </a>
                </li>
            </ul>

            <!-- Navbar Action Button -->
            <ul class="navbar-nav action">
                <li class="nav-item ml-3">
                    <a href="#" class="btn ml-lg-auto btn-bordered-white"><i
                            class="fas fa-paper-plane contact-icon mr-md-2"></i>Contact Us</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
