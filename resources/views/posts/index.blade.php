<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nhận diện Tiền Xu</title>
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
      <a href="http://127.0.0.1:8000/dashboard">🏠 Trang chủ</a>
      <a href="http://127.0.0.1:8000/posts">📜 Bài viết</a>
      <a href="#">📖 Giới thiệu</a>
    </nav>
    <div class="user-options">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>

      <button class="btn-logout" onclick="document.getElementById('logout-form').submit();">🔑 Đăng Xuất</button>
    </div>
  </header>

  <div class="container mx-auto px-4 py-6">
    <h1 style="color: white">Danh sách bài viết</h1>

    <!-- Form tìm kiếm -->
    <form method="GET" action="{{ url('posts') }}" class="mb-6">
        <input style="color: black" type="text" name="search" placeholder="Tìm bài viết..." class="px-4 py-2 rounded-md" style="width: 100%; max-width: 400px;">
    </form>

    <div class="post-list grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($posts as $post)
            <div class="post-item bg-gray-500 shadow-md rounded-lg">
                <h2 style="color: white">{{ $post->title }}</h2>
                <p style="color: white">{!! Str::limit($post->content, 100) !!}</p>
                <a href="{{ route('posts.show', $post->id) }}" style="color: white">Xem chi tiết →</a>
            </div>
        @endforeach
    </div>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
