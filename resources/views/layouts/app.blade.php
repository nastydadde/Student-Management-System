<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Admin - Student Management System</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- GSAP for advanced animations -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>

  <style>
    :root {
      --font-heading: 'IBM Plex Sans', sans-serif;
      --font-body: 'Inter', sans-serif;
    }

    body {
      font-family: var(--font-body);
      font-size: 15px;
      line-height: 1.5;
    }

    h1,
    h2,
    h3 {
      font-family: var(--font-heading);
      font-weight: 600;
    }

    .action-buttons {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Custom scrollbar for sidebar */
    #sidebar::-webkit-scrollbar {
      width: 6px;
    }

    #sidebar::-webkit-scrollbar-track {
      background: rgba(255, 255, 255, 0.1);
    }

    #sidebar::-webkit-scrollbar-thumb {
      background: rgba(255, 255, 255, 0.3);
      border-radius: 3px;
    }

    /* Hover effect for nav items */
    .nav-item {
      transition: all 0.2s ease;
    }

    .nav-item:hover {
      transform: translateX(4px);
    }

    /* Active nav item */
    .nav-item.active {
      background-color: #ef6a57;
      color: white;
    }

    /* Sidebar collapsed state */
    #sidebar.w-16 .nav-item {
      justify-content: center;
      padding: 0.75rem;
    }

    #sidebar.w-16 .nav-item:hover {
      transform: none;
    }

    #sidebar.w-16 .border-t {
      margin-top: auto;
      padding-top: 1rem;
    }

    /* Tooltip for collapsed sidebar */
    .nav-item {
      position: relative;
    }

    .nav-item .tooltip {
      position: absolute;
      left: 100%;
      top: 50%;
      transform: translateY(-50%);
      margin-left: 0.5rem;
      background: #1f2937;
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      font-size: 14px;
      white-space: nowrap;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.2s;
      z-index: 50;
    }

    #sidebar.w-16 .nav-item:hover .tooltip {
      opacity: 1;
    }

    /* Company watermark - Centered */
    .watermark {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      opacity: 0.1;
      z-index: 0;
      pointer-events: none;
      user-select: none;
    }

    .watermark img {
      width: 250px;
      height: 150px;
      object-fit: contain;
    }

    /* SweetAlert2 white theme styling */
    .swal2-popup {
      border: 2px solid #d33 !important;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2) !important;
    }

    .swal2-title {
      color: #d33 !important;
      border-bottom: 1px solid #eee;
      padding-bottom: 10px;
      margin-bottom: 15px;
    }

    .swal2-content {
      color: #333 !important;
    }

    .swal2-actions {
      margin-top: 20px !important;
      border-top: 1px solid #eee;
      padding-top: 15px;
    }

    /* Spinner Animations */
    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    @keyframes spin-reverse {
      to {
        transform: rotate(-360deg);
      }
    }

    .animate-spin {
      animation: spin 1s linear infinite;
    }

    .animate-spin-reverse {
      animation: spin-reverse 1.2s linear infinite;
    }

    /* Loading Dots Animation */
    .loading-dots span {
      opacity: 0;
      animation: dot-pulse 1.4s infinite;
    }

    .loading-dots span:nth-child(1) {
      animation-delay: 0.2s;
    }

    .loading-dots span:nth-child(2) {
      animation-delay: 0.4s;
    }

    .loading-dots span:nth-child(3) {
      animation-delay: 0.6s;
    }

    @keyframes dot-pulse {

      0%,
      100% {
        opacity: 0.2;
      }

      50% {
        opacity: 1;
      }
    }

    /* Container Animation */
    .loader-container {
      animation: gentle-pulse 2s ease-in-out infinite;
    }

    @keyframes gentle-pulse {

      0%,
      100% {
        transform: scale(1);
      }

      50% {
        transform: scale(1.03);
      }
    }
  </style>

  <script src="{{ asset('assets/js/modals.js')}}"></script>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const mainContent = document.getElementById('main-content');
      const logoText = document.getElementById('logo-text');
      const toggleIcon = document.getElementById('toggle-icon');

      sidebar.classList.toggle('w-64');
      sidebar.classList.toggle('w-16');

      mainContent.classList.toggle('ml-64');
      mainContent.classList.toggle('ml-16');

      // Toggle text visibility
      sidebar.querySelectorAll('.link-text').forEach(el => {
        el.classList.toggle('hidden');
        el.classList.toggle('block');
      });

      // Toggle logo text
      if (logoText) {
        logoText.classList.toggle('hidden');
      }

      // Change toggle icon
      if (sidebar.classList.contains('w-16')) {
        toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />';
      } else {
        toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
      }
    }

    function loadPage(url) {
      fetch(url)
        .then(response => response.text())
        .then(html => {
          const parser = new DOMParser();
          const doc = parser.parseFromString(html, 'text/html');
          const newContent = doc.getElementById('page-content');
          document.getElementById('main-content').innerHTML = newContent.innerHTML;
          history.pushState(null, '', url);

          // Update active nav state
          updateActiveNav(url);
        });
    }

    function updateActiveNav(url) {
      document.querySelectorAll('.nav-item').forEach(item => {
        item.classList.remove('active');
        if (item.href === url) {
          item.classList.add('active');
        }
      });
    }

    // Set active nav on page load
    window.addEventListener('DOMContentLoaded', () => {
      updateActiveNav(window.location.href);
    });
  </script>
</head>

<body class="bg-gray-50 text-gray-800 flex">

  <!-- Loading Screen -->
  <!-- Compact Loading Indicator -->
  <div id="loading-indicator" class="fixed inset-0 flex items-center justify-center pointer-events-none z-50">
    <div class="loader-container bg-white bg-opacity-90 p-6 rounded-xl shadow-xl">
      <!-- Animated Spinner -->
      <div class="relative w-16 h-16 mx-auto mb-4">
        <div class="absolute inset-0 border-4 border-red-500 border-t-transparent rounded-full animate-spin"></div>
        <div class="absolute inset-1 border-4 border-yellow-500 border-b-transparent rounded-full animate-spin-reverse"></div>
      </div>

      <!-- Text with animated dots -->
      <p class="text-gray-800 font-medium text-center">
        Loading
        <span class="loading-dots">
          <span>.</span><span>.</span><span>.</span>
        </span>
      </p>
    </div>
  </div>

  <!-- Sidebar -->
  <aside id="sidebar" class="bg-black text-white w-64 min-h-screen p-4 transition-all duration-300 flex flex-col fixed top-0 left-0 h-full z-10 overflow-y-auto overflow-x-hidden">
    <div class="flex items-center justify-between mb-8">
      <h2 id="logo-text" class="text-2xl font-bold link-text block" style="font-family: var(--font-heading);">Student Management System</h2>
      <button onclick="toggleSidebar()" class="flex-shrink-0 focus:outline-none hover:bg-gray-800 rounded-lg p-2 transition-colors">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none"
          viewBox="0 0 24 24" stroke="currentColor" id="toggle-icon">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" /> -->
        </svg>
      </button>
    </div>

    <nav class="flex flex-col space-y-2">
      <a href="{{ route('admin.dashboard') }}"
        class="nav-item flex items-center space-x-3 hover:bg-gray-800 px-4 py-3 rounded-lg transition-all">
        <span class="text-xl flex-shrink-0">🏠</span>
        <span class="link-text font-medium block">Dashboard</span>
        <span class="tooltip">Dashboard</span>
      </a>

      <a href="{{ route('admin.students') }}"
        class="nav-item flex items-center space-x-3 hover:bg-gray-800 px-4 py-3 rounded-lg transition-all">
        <span class="text-xl flex-shrink-0">👨‍🎓</span>
        <span class="link-text font-medium block">Students</span>
        <span class="tooltip">Students</span>
      </a>

      <a href="{{ route('admin.basicinfo') }}"
        class="nav-item flex items-center space-x-3 hover:bg-gray-800 px-4 py-3 rounded-lg transition-all">
        <span class="text-xl flex-shrink-0">📝</span>
        <span class="link-text font-medium block">Basic Info</span>
        <span class="tooltip">Basic Info</span>
      </a>

      <a href="{{ route('admin.results') }}"
        class="nav-item flex items-center space-x-3 hover:bg-gray-800 px-4 py-3 rounded-lg transition-all">
        <span class="text-xl flex-shrink-0">📊</span>
        <span class="link-text font-medium block">Results</span>
        <span class="tooltip">Results</span>
      </a>

      <a href="{{ route('admin.followups') }}"
        class="nav-item flex items-center space-x-3 hover:bg-gray-800 px-4 py-3 rounded-lg transition-all">
        <span class="text-xl flex-shrink-0">📅</span>
        <span class="link-text font-medium block">Follow-Up History</span>
        <span class="tooltip">Follow-Up History</span>
      </a>

      <a href="{{ route('admin.attendance') }}"
        class="nav-item flex items-center space-x-3 hover:bg-gray-800 px-4 py-3 rounded-lg transition-all">
        <span class="text-xl flex-shrink-0">🗓️</span>
        <span class="link-text font-medium block">Attendance</span>
        <span class="tooltip">Attendance</span>
      </a>

      <a href="{{ route('admin.report') }}"
        class="nav-item flex items-center space-x-3 hover:bg-gray-800 px-4 py-3 rounded-lg transition-all">
        <span class="text-xl flex-shrink-0">📈</span>
        <span class="link-text font-medium block">Student Report</span>
        <span class="tooltip">Student Report</span>
      </a>

      <a href="{{ route('admin.contacts') }}"
        class="nav-item flex items-center space-x-3 hover:bg-gray-800 px-4 py-3 rounded-lg transition-all">
        <span class="text-xl flex-shrink-0">📞</span>
        <span class="link-text font-medium block">Contacts</span>
        <span class="tooltip">Contacts</span>
      </a>

      @auth
      @if(auth()->user()->role === 'super_admin')
      <a href="{{ route('admin.users.index') }}"
        class="nav-item flex items-center space-x-3 hover:bg-gray-800 px-4 py-3 rounded-lg transition-all">
        <span class="text-xl flex-shrink-0">👤</span>
        <span class="link-text font-medium block">Manage Admins</span>
        <span class="tooltip">Manage Admins</span>
      </a>
      @endif
      @endauth

      <a href="{{ route('admin.password.reset') }}"
        class="nav-item flex items-center space-x-3 hover:bg-gray-800 px-4 py-3 rounded-lg transition-all">
        <span class="text-xl flex-shrink-0">🔒</span>
        <span class="link-text font-medium block">Reset Password</span>
        <span class="tooltip">Reset Password</span>
      </a>

      @php
      $isSuperAdmin = Auth::check() && Auth::user()->role === 'super_admin';
      @endphp
      @if($isSuperAdmin)

      <a href="{{ route('admin.export') }}"
        class="nav-item flex items-center space-x-3 hover:bg-gray-800 px-4 py-3 rounded-lg transition-all">
        <span class="text-xl flex-shrink-0">📂</span>
        <span class="link-text font-medium block">Export</span>
        <span class="tooltip">Export</span>
      </a>
      @endif

      <!-- Credits Page Link Added Here -->
      <a href="{{ route('admin.credits') }}"
        class="nav-item flex items-center space-x-3 hover:bg-gray-800 px-4 py-3 rounded-lg transition-all">
        <span class="text-xl flex-shrink-0">🌟</span>
        <span class="link-text font-medium block">Credits</span>
        <span class="tooltip">Development Team</span>
      </a>

    </nav>

    <!-- Logout button at bottom -->
    <div class="mt-auto pt-6 border-t border-gray-800 flex justify-center">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
          class="flex items-center space-x-3 bg-red-700 hover:bg-red-800 text-white font-medium px-4 py-3 rounded-lg transition-all">
          <span class="text-xl">🚪</span>
          <span>Logout</span>
        </button>
      </form>
    </div>




    <!-- Minimal Footer -->
    <div class="text-xs text-gray-500 text-center py-2 mt-8">
      {{ date('Y') }} | Built by Team 818 

    </div>
  </aside>

  <!-- Main Content -->
  <main id="main-content" class="flex-1 ml-64 transition-all duration-300 p-8">

    {{-- Show header unless 'hide-header' is defined --}}
    @unless(View::hasSection('hide-header'))
    <div class="flex flex-col items-center">
      <!-- <img src="" alt="Logo" class="h-12 mb-2" > -->
       <p class="h-12 mb-2 text-3xl text-red-700">Team 818</p>
    </div>

    <!-- Header Bar -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
      <div class="flex items-center justify-between">
        <div>
          <h2 class="text-3xl text-gray-900" style="font-family: var(--font-heading);">Welcome to Student Management System</h2>
          <p class="text-gray-600 mt-1">Manage your students, results, and attendance efficiently</p>
        </div>
        <div class="flex items-center space-x-4">
          <div class="text-right">
            <p class="font-semibold text-gray-900">{{ auth()->user()->name ?? 'Admin' }}</p>
            <p class="text-sm text-gray-600">{{ auth()->user()->email ?? 'admin@portal.com' }}</p>
          </div>
          <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center text-white font-bold text-lg">
            {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
          </div>
        </div>
      </div>
    </div>
    @endunless

    <!-- Page Content -->
    <div id="page-content" class="bg-white rounded-xl shadow-sm p-6">
      @yield('content')
    </div>

  </main>


  @stack('scripts')

  <!-- Company Watermark - Now Centered
  <div class="watermark">
  </div> -->

  <!-- loading screen js -->
  <script>
    // Show loader
    function showLoader() {
      const loader = document.getElementById('loading-indicator');
      loader.style.display = 'flex';
      setTimeout(() => loader.style.opacity = '1', 10);
    }

    // Hide loader
    function hideLoader() {
      const loader = document.getElementById('loading-indicator');
      loader.style.opacity = '0';
      setTimeout(() => loader.style.display = 'none', 300);
    }

    // Usage examples:
    document.addEventListener('DOMContentLoaded', hideLoader); // Hide on initial load

    // For AJAX calls:
    fetch('/data').then(hideLoader).catch(hideLoader);

    // For form submissions:
    document.querySelector('form').addEventListener('submit', showLoader);


    // Global SweetAlert2 theme configuration
    // Configure global SweetAlert2 theme
    const Toast = Swal.mixin({
      background: '#ffffff',
      color: '#000000',
      confirmButtonColor: '#ca2125',
      cancelButtonColor: '#777777',
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    });
  </script>
  <script>
    // Detect Laravel's success/error messages and convert to SweetAlert2
    document.addEventListener('DOMContentLoaded', function() {
        @if(Session::has('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ Session::get("success") }}',
                iconColor: '#10B981'
            });
        @endif
        
        @if(Session::has('error'))
            Toast.fire({
                icon: 'error',
                title: '{{ Session::get("error") }}',
                iconColor: '#EF4444'
            });
        @endif
        
        @if($errors->any())
            Toast.fire({
                icon: 'error',
                title: 'Please fix the errors in the form',
                text: `@foreach ($errors->all() as $error) • {{ $error }}\n @endforeach`
            });
        @endif
    });
</script>
</body>

</html>