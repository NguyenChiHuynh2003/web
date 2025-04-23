<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nhận diện tiền xu AI</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<main>
   <header class="header">
    <div class="logo">
      <img src="{{ asset('storage/logo.jpg') }}" alt="Logo" class="logo-img">
      <span class="app-name">Coins Master</span>
    </div>
    <nav class="nav">
      <a href="http://192.168.1.100:8000/dashboard">🏠 Trang chủ</a>
      <a href="http://192.168.1.100:8000/posts">📜 Bài viết</a>
      <a href="http://192.168.1.100:8000/about" class="font-bold text-purple-700">📖 Giới thiệu</a>
      <a href="http://192.168.1.100:8000/account">👤 Tài khoản</a>
    </nav>
    <div class="user-options">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      <button class="btn-logout" onclick="document.getElementById('logout-form').submit();">🔑 Đăng Xuất</button>
    </div>
  </header>
  <main class="container mx-auto my-8 px-4">
    <h1 class="text-3xl font-semibold mb-6 text-center" style="color: rgb(78, 121, 240);">{{ $post->title }}</h1>

    <div class="prose prose-invert max-w-none">
      {!! $post->content !!}
    </div>
  </main>

  <div class="footer bg-gray-800 text-white py-4">
    <div class="footer-content text-center">
      <p>&copy; 2025 Coins Master. Đây là footer</p>
      <p>Liên hệ: nh3571412@gmail.com</p>
    </div>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
