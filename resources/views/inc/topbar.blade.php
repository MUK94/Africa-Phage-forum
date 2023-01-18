<header class="topbar">
    <div class="navbar" id="myTopnav">
      <div class="topLogo">
        <a href="{{ route('pages.index') }}">
          <img class="mylogo" src="/public/img/apf-logo.jpeg" alt="Logo">
        </a>
        </div>
            <i class="fa-solid fa-bars menuToggle" onclick="toggleMenu()"></i>
      <div class="navigation">
        <div class="topMenu">
          <ul>
            <li><a href="{{ route('pages.index') }}" onclick="toggleMenu();">Home </a></li>
            <li> <a href="{{ route('pages.about') }}" onclick="toggleMenu();">About </a></li>
            <li><a href="{{ route('pages.team') }}" onclick="toggleMenu();">Teams </a></li>
            <li> <a href="{{ route('posts.blog') }}" onclick="toggleMenu();">Blog</a></li>
            <li> <a href="{{ route('pages.contact') }}" onclick="toggleMenu();">Contact </a></li>
          </ul>
        </div>
        <div class="topUser">
          <ul>
            @guest
              <li class="userOut">
                <a href="{{ route('login') }}" onclick="toggleMenu()">
                  Login
                </a>
                <a href="{{ route('register') }}" onclick="toggleMenu();">
                  Join Us
                </a>
              </li>
            @else
            <li class="dropdown">
              <div class="userDetails">
                  <div class="iconUserName"><img src="{{ asset('/public/storage/'.(Auth::user()->image)) }}" alt="">
                    <span>{{Auth::user()->name}}</span>
                  </div>
                  <div class="dropdown-content">

                    @if(Auth::user()->getRole() == 'admin')
                      <a href="{{ route('admin.home.index') }}">
                        Dashboard
                      </a>
                    @endif

                    <a href="{{ route('pages.profile') }}" >Edit Profile</a>
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                      <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">
                        Logout 
                      </a>
                      @csrf
                    </form>
                  </div>
              </div>
            </li>
            <li class="dropMenu">
              @if($user = Auth::user()->getRole() == 'admin')
                <a href="{{ route('admin.home.index') }}">
                  Dashboard
                </a>
                
              @endif
              <a href="{{ route('pages.profile') }}" >Edit Profile</a>
              <form id="logout" action="{{ route('logout') }}" method="POST">
                <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">
                  Logout
                </a>
                @csrf
              </form>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </div>
</header>
