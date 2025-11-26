<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Story Bootstrap Template')</title>
  <meta name="description" content="@yield('description', '')">
  <meta name="keywords" content="@yield('keywords', '')">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/band-style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/fix-links.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/color-hunt-theme.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/force-color-hunt.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/final-color-hunt-override.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/notifications.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/force-text-contrast.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/enhanced-design.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/final-enhancements.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/menu-animations.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/dashboard-animations.css') }}" rel="stylesheet">
  
  <style>
  /* Header animation */
  @keyframes headerSlideDown {
    0% {
      transform: translateY(-100%);
      opacity: 0;
    }
    100% {
      transform: translateY(0);
      opacity: 1;
    }
  }
  
  #header {
    animation: headerSlideDown 0.8s ease-out;
  }
  
  /* Navbar menu animations */
  .navmenu ul {
    animation: slideInFromTop 0.8s ease-out;
  }
  
  .navmenu ul li {
    animation: fadeInUp 0.6s ease-out;
    animation-fill-mode: both;
  }
  
  .navmenu ul li:nth-child(1) { animation-delay: 0.1s; }
  .navmenu ul li:nth-child(2) { animation-delay: 0.2s; }
  .navmenu ul li:nth-child(3) { animation-delay: 0.3s; }
  .navmenu ul li:nth-child(4) { animation-delay: 0.4s; }
  .navmenu ul li:nth-child(5) { animation-delay: 0.5s; }
  .navmenu ul li:nth-child(6) { animation-delay: 0.6s; }
  
  @keyframes slideInFromTop {
    0% {
      transform: translateY(-30px);
      opacity: 0;
    }
    100% {
      transform: translateY(0);
      opacity: 1;
    }
  }
  
  @keyframes fadeInUp {
    0% {
      transform: translateY(20px);
      opacity: 0;
    }
    100% {
      transform: translateY(0);
      opacity: 1;
    }
  }
  
  /* Menu item hover animations */
  .navmenu ul li a {
    color: #000000 !important;
    -webkit-text-fill-color: #000000 !important;
    font-weight: 600 !important;
    position: relative;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    padding: 10px 15px;
    border-radius: 8px;
    overflow: hidden;
  }
  
  .navmenu ul li a::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
    transition: left 0.5s;
  }
  
  .navmenu ul li a:hover::before {
    left: 100%;
  }
  
  .navmenu ul li a::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background: linear-gradient(45deg, #667eea, #764ba2);
    transition: width 0.3s ease;
  }
  
  .navmenu ul li a:hover::after,
  .navmenu ul li a.active::after {
    width: 100%;
  }
  
  .navmenu ul li a:hover,
  .navmenu ul li a.active {
    color: #667eea !important;
    -webkit-text-fill-color: #667eea !important;
    transform: translateY(-2px);
    background: rgba(102, 126, 234, 0.05);
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
  }
  
  /* Dropdown animations */
  .navmenu ul li.dropdown > a {
    cursor: pointer !important;
    pointer-events: auto !important;
  }
  
  .navmenu ul li .dropdown ul {
    pointer-events: auto !important;
    opacity: 0;
    transform: translateY(-10px);
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
  }
  
  .navmenu ul li.dropdown:hover .dropdown ul {
    opacity: 1;
    transform: translateY(0);
  }
  
  .navmenu ul li .dropdown ul li a {
    color: #000000 !important;
    -webkit-text-fill-color: #000000 !important;
    pointer-events: auto !important;
    margin: 5px;
    border-radius: 10px;
  }
  
  .navmenu ul li .dropdown ul li a:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white !important;
    -webkit-text-fill-color: white !important;
    transform: translateX(5px);
  }
  
  /* User dropdown animations */
  .dropdown-toggle {
    color: #000000 !important;
    -webkit-text-fill-color: #000000 !important;
    transition: all 0.3s ease;
    padding: 8px 12px;
    border-radius: 25px;
    background: rgba(102, 126, 234, 0.05);
    border: 1px solid rgba(102, 126, 234, 0.1);
  }
  
  .dropdown-toggle:hover {
    background: rgba(102, 126, 234, 0.1);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.2);
  }
  
  .dropdown-menu {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    animation: dropdownSlideIn 0.3s ease-out;
  }
  
  @keyframes dropdownSlideIn {
    0% {
      opacity: 0;
      transform: translateY(-10px) scale(0.95);
    }
    100% {
      opacity: 1;
      transform: translateY(0) scale(1);
    }
  }
  
  .dropdown-menu .dropdown-item {
    color: #000000 !important;
    -webkit-text-fill-color: #000000 !important;
    transition: all 0.3s ease;
    border-radius: 10px;
    margin: 5px;
  }
  
  .dropdown-menu .dropdown-item:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white !important;
    -webkit-text-fill-color: white !important;
    transform: translateX(5px);
  }
  
  /* Logo animation */
  .logo {
    animation: logoSlideIn 0.8s ease-out;
    transition: transform 0.3s ease;
  }
  
  @keyframes logoSlideIn {
    0% {
      transform: translateX(-30px);
      opacity: 0;
    }
    100% {
      transform: translateX(0);
      opacity: 1;
    }
  }
  
  .logo:hover {
    transform: scale(1.05);
  }
  
  /* Header social links animation */
  .header-social-links {
    animation: slideInFromRight 0.8s ease-out;
  }
  
  @keyframes slideInFromRight {
    0% {
      transform: translateX(30px);
      opacity: 0;
    }
    100% {
      transform: translateX(0);
      opacity: 1;
    }
  }
  
  /* Button animations */
  .btn-enhanced {
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    position: relative;
    overflow: hidden;
  }
  
  .btn-enhanced::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
  }
  
  .btn-enhanced:hover::before {
    left: 100%;
  }
  
  .btn-enhanced:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
  }
  
  /* Hide social media icons */
  .header-social-links a.twitter,
  .header-social-links a.facebook,
  .header-social-links a.instagram,
  .header-social-links a.linkedin {
    display: none !important;
  }
  
  /* Hide floating notification button */
  a[href*="notifications"][style*="position: fixed"],
  a[href*="notifications"][style*="bottom"],
  .floating-notification,
  #floating-notification {
    display: none !important;
  }
  </style>
  
  <!-- Custom Pagination CSS -->
  <style>
  .pagination {
    justify-content: center;
    margin: 2rem 0;
  }
  
  .pagination .page-link {
    color: #c9b59c;
    border: 1px solid #d9cfc7;
    padding: 0.5rem 0.75rem;
    margin: 0 2px;
    border-radius: 8px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    background: #f9f8f6;
  }
  
  .pagination .page-link:hover {
    color: white;
    background: #c9b59c;
    border-color: #c9b59c;
    transform: translateY(-1px);
  }
  
  .pagination .page-item.active .page-link {
    background: #c9b59c;
    border-color: #c9b59c;
    color: white;
  }
  
  .pagination .page-item.disabled .page-link {
    color: #999;
    background-color: #efe9e3;
    border-color: #d9cfc7;
  }
  
  .pagination .page-link svg {
    display: none !important;
  }
  
  .pagination .page-item:first-child .page-link::before {
    content: '‹';
    font-size: 18px;
    font-weight: bold;
  }
  
  .pagination .page-item:last-child .page-link::before {
    content: '›';
    font-size: 18px;
    font-weight: bold;
  }
  
  .pagination .page-link[rel="prev"]::before {
    content: '‹ Previous';
    font-size: 14px;
  }
  
  .pagination .page-link[rel="next"]::before {
    content: 'Next ›';
    font-size: 14px;
  }
  </style>

  @stack('styles')
</head>

<body class="@yield('body-class')">

  @include('partials.navbar')

  <main class="main">
    @yield('content')
  </main>

  @yield('footer', View::make('partials.footer'))

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/clickable-articles.js') }}"></script>
  <script src="{{ asset('assets/js/notifications.js') }}"></script>
  <script src="{{ asset('assets/js/menu-animations.js') }}"></script>

  @stack('scripts')
  
  <!-- Menu Animation Script -->
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    // Add ripple effect to menu items
    const menuLinks = document.querySelectorAll('.navmenu ul li a');
    menuLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        
        ripple.style.cssText = `
          position: absolute;
          width: ${size}px;
          height: ${size}px;
          left: ${x}px;
          top: ${y}px;
          background: rgba(102, 126, 234, 0.3);
          border-radius: 50%;
          transform: scale(0);
          animation: ripple 0.6s linear;
          pointer-events: none;
        `;
        
        this.appendChild(ripple);
        
        setTimeout(() => {
          ripple.remove();
        }, 600);
      });
    });
    
    // Add CSS for ripple animation
    const style = document.createElement('style');
    style.textContent = `
      @keyframes ripple {
        to {
          transform: scale(4);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);
  });
  </script>
  
  {{-- Include notification system --}}
  @include('partials.notifications')

</body>
</html>