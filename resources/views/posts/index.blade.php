<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nhận diện tiền xu AI</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Cấu trúc của các khung bài viết */
    .post-item {
      background-color: white;
      color: #333;
      border-radius: 8px;
      padding: 16px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      height: 100%; /* Đảm bảo khung có chiều cao đều nhau */
      justify-content: space-between;
    }

    .post-item h2 {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 12px;
    }

    .post-item p {
      font-size: 14px;
      margin-bottom: 12px;
      overflow: hidden; /* Không cho phép văn bản tràn ra ngoài */
      text-overflow: ellipsis; /* Cắt bớt văn bản nếu quá dài */
      white-space: nowrap; /* Giữ văn bản trong một dòng */
    }

    .post-item a {
      font-size: 14px;
      color: #007bff;
      text-decoration: none;
    }

    .post-item a:hover {
      text-decoration: underline;
    }

    /* Đảm bảo các bài viết trong hàng có chiều rộng đều nhau */
    .row {
      display: flex;
      flex-wrap: wrap;
      gap: 16px; /* Khoảng cách giữa các bài viết */
    }

    .col-md-4 {
      flex: 1 1 calc(25% - 16px); /* 4 bài mỗi hàng, với khoảng cách 16px */
      box-sizing: border-box;
    }

    /* Các bài viết không vượt quá chiều rộng của cột */
    @media (max-width: 768px) {
      .col-md-4 {
        flex: 1 1 calc(50% - 16px); /* Trên màn hình nhỏ hơn, mỗi hàng có 2 bài viết */
      }
    }

    @media (max-width: 480px) {
      .col-md-4 {
        flex: 1 1 100%; /* Trên màn hình rất nhỏ, mỗi hàng có 1 bài viết */
      }
    }
  </style>
</head>
<body>
<main>
   <header class="header">
     <div class="logo" onmouseenter="playLogoSound()" onmouseleave="stopLogoSound()">
         <button class="menu-toggle" onclick="toggleMenu()">☰</button>
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

  <div class="container">
    <h1 class="text-center mb-4 text-dark" style="font-size: 16px;">Danh sách bài viết</h1>

    <div class="row">
      @foreach ($posts as $post)
        <div class="col-md-4">
          <div class="post-item">
            <h2 class="text-dark">
              {{ $post->title }}
            </h2>
            <p>
              {!! Str::limit($post->content, 100) !!}
            </p>
            <a href="{{ route('posts.show', $post->id) }}" class="text-dark">
              Xem chi tiết →
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
   <div class="footer mt-10 text-center text-sm text-gray-500">
    <p>&copy; 2025 Coin Master</p>
    <p>Liên hệ: nh3571412@gmail.com</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
