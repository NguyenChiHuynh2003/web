<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nhận diện tiền xu AI</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Container chính để canh đều */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      text-align: center;
    }

    /* Tiêu đề */
    h1 {
      color: black; /* Chữ đen */
      font-size: 3rem; /* Chữ bự */
      font-weight: bold; /* Chữ in đậm */
      text-align: center; /* Căn giữa */
      margin-top: 70px; /* Cách top 70px */
    }

    /* Các đoạn văn bản còn lại */
    .prose p {
      color: black; /* Chữ đen */
      font-size: 0.875rem; /* Chữ nhỏ */
    }

    /* Đảm bảo các ảnh trong bài viết cũng căn giữa */
    .prose img {
      max-width: 100%;
      height: auto;
      display: block;
      margin: 20px auto; /* Căn giữa ảnh */
    }
  </style>
</head>
<body>
  <header class="header">
           <button class="menu-toggle" onclick="toggleMenu()">☰</button>
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
          <a href="http://127.0.0.1:8000/xu">🪙 Xu cổ</a>
    </nav>
    <div class="user-options">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      <button class="btn-logout" onclick="document.getElementById('logout-form').submit();">🔑 Đăng Xuất</button>
    </div>
  </header>

  <main>
    <div class="container">
      <h1>{{ $post->title }}</h1>

      <div class="prose prose-invert max-w-none">
        {!! $post->content !!}
      </div>
    </div>
  </main>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
