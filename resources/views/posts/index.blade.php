<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nhận diện tiền xu AI</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<main>
   <header class="header">
     <div class="logo" onmouseenter="playLogoSound()" onmouseleave="stopLogoSound()">
      <!-- Hiển thị logo từ database -->
        <img src="{{ asset('storage/' . $pageConfig->logo_path) }}" alt="Logo" class="logo-img">
        <span class="app-name">{{ $pageConfig->site_name ?? 'Coin Master' }}</span> <!-- Hiển thị tên trang web -->
    </div>
    <nav class="nav">
      <a href="http://127.0.0.1:8000/dashboard">🏠 Trang chủ</a>
      <a href="http://127.0.0.1:8000/posts">📜 Bài viết</a>
      <a href="http://127.0.0.1:8000/about" class="font-bold text-purple-700">📖 Giới thiệu</a>
      <a href="http://127.0.0.1:8000/account">👤 Tài khoản</a>
    </nav>
    <div class="user-options">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      <button class="btn-logout" onclick="document.getElementById('logout-form').submit();">🔑 Đăng Xuất</button>
    </div>
  </header>

  <div class="container">
    <h1 class="text-center mb-4 text-dark" style="font-size: 16px;">Danh sách bài viết</h1>

    <!-- Form tìm kiếm -->
    <form method="GET" action="{{ url('posts') }}" class="mb-4">
      <div class="input-group">
        <input type="text" name="search" placeholder="Tìm bài viết..." class="form-control" aria-label="Search">
        <button class="btn btn-outline-dark" type="submit">Tìm kiếm</button>
      </div>
    </form>

    <div class="row">
      @foreach ($posts as $post)
        <div class="col-md-4">
          <div class="post-item bg-white text-dark rounded p-4 mb-4 shadow-sm">
            <h2 class="text-dark" style="font-size: 16px;">
              {{ $post->title }}
            </h2>
            <p style="font-size: 16px;">
              {!! Str::limit($post->content, 100) !!}
            </p>
            <a href="{{ route('posts.show', $post->id) }}" class="text-dark" style="font-size: 16px;">
              Xem chi tiết →
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <footer class="bg-light text-dark py-4 mt-5">
    <div class="text-center">
      <p>&copy; 2025 Coins Master. Đây là footer</p>
      <p>Liên hệ: nh3571412@gmail.com</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
