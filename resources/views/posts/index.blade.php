<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bài viết - Coins Master</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <header class="header">
    <div class="logo">
      <img src="{{ asset('storage/logo.jpg') }}" alt="Logo" class="logo-img">
      <span class="app-name">Coins Master</span>
    </div>
    <nav class="nav">
      <a href="/" class="text-gray-700 hover:text-blue-500">🏠 Trang chủ</a>
      <a href="http://127.0.0.1:8000/posts">📜 Bài viết</a>
      <a href="#" class="text-gray-700 hover:text-blue-500">📖 Giới thiệu</a>
    </nav>
    < <div class="user-options">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <button class="btn-logout" onclick="document.getElementById('logout-form').submit();">🔑 Đăng Xuất</button>

    </div>
  </header>

  <div class="container">
    <h1>Danh sách bài viết</h1>
    <div class="post-list grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      @foreach ($posts as $post)
        <div class="post-item bg-white shadow-md rounded p-4 hover:bg-gray-100 transition">
          <h2 class="text-xl font-semibold text-gray-900">{{ $post->title }}</h2>
          <p class="text-gray-600 mt-2">{{ Str::limit($post->content, 100) }}</p>
          <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 mt-2 inline-block">Xem chi tiết →</a>
        </div>
      @endforeach
    </div>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
