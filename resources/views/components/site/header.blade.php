<header id="header" class="fixed-top" @isset($dataPage) style="background-color: #000;" @endisset >
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="/">
        @isset($home['home-header-title'])
            {{$home['home-header-title']}}
        @endisset
        </a></h1>

        <nav id="navbar" class="navbar">
            @if(isset($dataPage))
            <ul style="text-transform:uppercase">
                <li><a class="nav-link scrollto active" href="{{asset('/')}}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{asset('/#about')}}">About</a></li>
                <li><a class="nav-link scrollto" href="{{asset('/#services')}}">Services</a></li>
                @auth
                <li><a class="nav-link scrollto " href="{{route('dashboard')}}">Admin</a></li>
                @endauth
                <li class="dropdown"><a href="{{route('work.category', ['category' => '0'])}}"><span>Work</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{route('work.category', ['category' => 0])}}">All</a></li>
                        @foreach ($workTypes as $work => $value)
                            <li><a href="{{route('work.category', ['category' => $work])}}">{{$value}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            </ul>
            @else    
            <ul style="text-transform:uppercase">
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                @auth
                <li><a class="nav-link scrollto " href="{{route('dashboard')}}">Admin</a></li>
                @endauth
                <li class="dropdown"><a href="#"><span>Work</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{route('work.category', ['category' => 0])}}">All</a></li>
                        @foreach ($workTypes as $work => $value)
                            <li><a href="{{route('work.category', ['category' => $work])}}">{{$value}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            </ul>
            @endif
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>
