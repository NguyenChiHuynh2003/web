<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $post->title }} - Coins Master</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <header class="header bg-blue-600 text-white py-4">
    <div class="logo flex items-center space-x-3">
      <img src="{{ asset('storage/logo.jpg') }}" alt="Logo" class="logo-img w-10 h-10">
      <span class="app-name text-2xl font-bold">Coins Master</span>
    </div>
    <nav class="nav mt-4">
      <a href="/" class="text-white hover:text-blue-300 mx-2">🏠 Trang chủ</a>
      <a href="http://127.0.0.1:8000/posts" class="text-white hover:text-blue-300 mx-2">📜 Bài viết</a>
      <a href="#" class="text-white hover:text-blue-300 mx-2">📖 Giới thiệu</a>
    </nav>
    <div class="user-options mt-4">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <button class="btn-logout bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-400 transition" onclick="document.getElementById('logout-form').submit();">🔑 Đăng Xuất</button>
    </div>
  </header>

  <div class="container mx-auto my-8 px-4 w-4/5">
    <h1 class="text-3xl font-semibold mb-6 text-center">{{ $post->title }}</h1>
    <p class="text-lg text-white leading-relaxed">{{ $post->content }}</p>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
