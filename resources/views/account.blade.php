<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nhận diện tiền xu AI</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <style>
    /* Tăng khoảng cách giữa header và container */
    .container {
      margin-top: 160px;
    }

    @media (max-width: 768px) {
      .container {
        margin-top: 180px;
      }
    }

    /* Giới hạn kích thước ảnh đại diện upload */
    .avatar-upload-preview {
        width: 180px;  /* Đảm bảo chiều rộng cố định */
        height: 180px; /* Đảm bảo chiều cao cố định */
        margin: 10px auto;
        border-radius: 50%; /* Để hình ảnh có hình dạng tròn */
        object-fit: cover; /* Đảm bảo ảnh không bị méo */
}



    /* Giới hạn chiều rộng form upload file */
    .upload-input {
      max-width: 320px;
      margin: 0 auto;
    }

    /* Cải thiện căn chỉnh cho form */
    form {
      max-width: 600px;
      margin: 0 auto;
    }

    label {
      display: block;
      font-size: 1rem;
      margin-bottom: 0.5rem;
      text-align: left;
    }

    .input-group {
      margin-bottom: 1.5rem;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      font-size: 1rem;
      border-radius: 5px;
      border: 1px solid #ddd;
    }
  </style>
</head>
<body>
  <!-- Âm thanh khi hover logo -->
  <audio id="logo-sound" src="{{ asset('storage/1.mp3') }}"></audio>

  <!-- Toàn bộ layout trong main -->
  <main style="position: relative; z-index: 1; display: flex; flex-direction: column; min-height: 100vh;">
    <!-- Header -->
    <header class="header">
        <button class="menu-toggle" onclick="toggleMenu()">☰</button>
       <div class="logo" onmouseenter="playLogoSound()" onmouseleave="stopLogoSound()">
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
  <div class="container max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Cập nhật thông tin tài khoản</h1>

    @if ($user->image)
      <div class="flex justify-center">
        <img src="{{ asset('storage/' . $user->image) }}" alt="Avatar" class="mt-2 rounded-full object-cover avatar-upload-preview">
      </div>
    @endif

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
      @csrf

      <div class="input-group">
        <label for="name">Họ và tên</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
      </div>

      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
      </div>

      <div class="input-group">
        <label for="SDT">Số điện thoại</label>
        <input type="text" name="SDT" id="SDT" value="{{ old('SDT', $user->SDT) }}">
      </div>

      <div class="input-group">
        <label for="password">Mật khẩu mới</label>
        <input type="password" name="password" id="password" placeholder="Để trống nếu không thay đổi">
      </div>

      <div class="input-group">
        <label for="password_confirmation">Xác nhận mật khẩu</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
      </div>

      <div class="input-group text-center">
        <label for="image">Ảnh đại diện</label>
        <input type="file" name="image" id="image" class="upload-input">
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="bg-purple-700 hover:bg-purple-800 px-6 py-2 rounded text-white">💾 Lưu thay đổi</button>
      </div>
    </form>
  </div>

  <div class="footer">
    <p>&copy; 2025 Coins Master</p>
    <p>Liên hệ: nh3571412@gmail.com</p>
  </div>
</main>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
