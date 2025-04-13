<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nhận diện Tiền Xu</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body style="background-color: #1a202c; color: white; font-family: Arial, sans-serif;">

<header class="header">
    <div class="logo">
      <img src="{{ asset('storage/logo.jpg') }}" alt="Logo" class="logo-img">
      <span class="app-name">Coins Master</span>
    </div>
    <nav class="nav">
      <a href="http://192.168.1.100:8000/dashboard">🏠 Trang chủ</a>
      <a href="http://192.168.1.100:8000/posts">📜 Bài viết</a>
      <a href="http://192.168.1.100:8000/about">📖 Giới thiệu</a>
      <a href="http://192.168.1.100:8000/account" class="font-bold text-purple-700">👤 Tài khoản</a>
    </nav>
    <div class="user-options">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      <button class="btn-logout" onclick="document.getElementById('logout-form').submit();">🔑 Đăng Xuất</button>
    </div>
  </header>

  <div class="container mx-auto px-4 py-6">
    <h1 style="color: white; font-size: 24px; font-weight: bold; margin-bottom: 20px;">Danh sách bài viết</h1>

    <!-- Form tìm kiếm -->
    <form method="GET" action="{{ url('posts') }}" class="mb-6">
      <input type="text" name="search" placeholder="Tìm bài viết..." class="px-4 py-2 rounded-md w-full max-w-md text-black">
    </form>

    <div class="post-list grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @foreach ($posts as $post)
        <div class="post-item bg-gray-500 shadow-md rounded-lg p-4 transition duration-300 hover:bg-gray-600">
          <h2 style="font-size: 20px; font-weight: bold; color:rgb(78, 121, 240); margin-bottom: 10px;">
            {{ $post->title }}
          </h2>
          <p style="font-size: 14px; color: #FFFFFF; margin-bottom: 12px;">
            {!! Str::limit($post->content, 100) !!}
          </p>
          <a href="{{ route('posts.show', $post->id) }}" style="color: #ADD8E6; text-decoration: none;">
            Xem chi tiết →
          </a>
        </div>
      @endforeach
    </div>
  </div>

  <div class="footer bg-gray-800 text-white py-4 mt-10">
    <div class="footer-content text-center">
      <p>&copy; 2025 Coins Master. Đây là footer</p>
      <p>Liên hệ: nh3571412@gmail.com</p>
    </div>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
