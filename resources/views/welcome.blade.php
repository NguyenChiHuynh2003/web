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
      <span class="app-name">Coin Master</span>
    </div>
    <nav class="nav">
      <a href="http://192.168.1.100:8000/dashboard">🏠 Trang chủ</a>
      <a href="http://192.168.1.100:8000/posts">📜 Bài viết</a>
      <a href="http://192.168.1.100:8000/about" class="font-bold text-purple-700">📖 Giới thiệu</a>
    </nav>
    <div style="margin-right: 5%" class="user-options">
        <a href="http://192.168.1.100:8000/login" class="button blue">Đăng nhập</a>
        <a href="http://192.168.1.100:8000/register" class="button green">Đăng ký</a>
    </div>

  </header>

  <div class="container">
    <h1>Nhận diện tiền xu</h1>

    <div class="button-group">
      <input type="file" id="upload" accept="image/*" hidden onchange="uploadImageBoth()" />
      <button class="button purple" onclick="document.getElementById('upload').click()">Chọn ảnh</button>
      <button class="button red" onclick="clearResults()">Xóa kết quả</button>
    </div>

    <div class="result-container">
      <div class="image-preview">
        <img id="coin-image" class="hidden" alt="Hình ảnh xu đã chọn">
      </div>
      <div class="text-box">
        <p id="info">Kết quả sẽ hiển thị ở đây</p>
      </div>
    </div>

    <div class="chat-answer-box">
      <p id="chat-answer">Thông tin chi tiết sẽ hiển thị tại đây...</p>
    </div>
  </div>

  <footer class="footer">
    <div class="footer-content">
      <p>© 2025 Coins Master. Hệ thống nhận diện tiền xu bằng AI.</p>
      <p>Trường Đại học Nam Cần Thơ</p>
    </div>
  </footer>
</main>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
