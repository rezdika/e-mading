<header id="header" class="header d-flex align-items-center position-relative glass-card" style="backdrop-filter: blur(20px); background: rgba(255, 255, 255, 0.95); box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37); border-radius: 0; border: none; border-bottom: 1px solid rgba(255, 255, 255, 0.18);">
  <div class="container position-relative d-flex align-items-center justify-content-between">

    <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0 hover-lift">
      <h1 class="sitename text-glow" style="background: linear-gradient(45deg, #667eea, #764ba2); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 800; margin: 0;">Mading 666</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('category') }}" class="{{ request()->routeIs('category') ? 'active' : '' }}">Category</a></li>
        <li class="dropdown"><a href="#"><span>Pages</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="{{ route('category') }}">Category</a></li>
            <li><a href="{{ route('arsip.index') }}">Arsip Artikel</a></li>
            <li><a href="{{ route('tutorial.index') }}">Tutorial</a></li>
          </ul>
        </li>
        <li><a href="{{ route('pengumuman.index') }}" class="{{ request()->routeIs('pengumuman.*') ? 'active' : '' }}">Pengumuman</a></li>
        @auth
        <li><a href="{{ route('notifications.index') }}" class="{{ request()->routeIs('notifications.*') ? 'active' : '' }}">Notifikasi</a></li>
        @endauth
        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <div class="header-social-links d-flex align-items-center">
      @auth
        <div class="dropdown me-3">
          <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle me-1"></i>
            <span>{{ Auth::user()->nama }}</span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i class="bi bi-person"></i> Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
              </form>
            </li>
          </ul>
        </div>
      @else
        <a href="{{ route('login') }}" class="btn btn-enhanced btn-outline-primary btn-sm me-3">
          <i class="bi bi-box-arrow-in-right"></i> Login
        </a>
      @endauth
      
      <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>

  </div>
</header>