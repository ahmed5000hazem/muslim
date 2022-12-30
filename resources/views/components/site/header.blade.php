<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="/">
        @isset($home['home-header-title'])
            {{$home['home-header-title']}}
        @endisset
        </a></h1>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                @auth
                <li><a class="nav-link scrollto " href="{{route('dashboard')}}">Admin</a></li>
                @endauth
                <li class="dropdown"><a href="#"><span>Work</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        {{-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                    class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li> --}}
                        <li><a href="{{route('work.category', ['category' => 0])}}">All</a></li>
                        @foreach ($workTypes as $work => $value)
                            <li><a href="{{route('work.category', ['category' => $work])}}">{{$value}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
