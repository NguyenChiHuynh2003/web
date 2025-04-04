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
      <a href="http://127.0.0.1:8000/index">🏠 Trang chủ</a>
      <a href="#">📜 Thư viện</a>
      <a href="#">📖 Giới thiệu</a>
    </nav>
    <div class="user-options">
      <button class="btn-login">🔑 Đăng nhập</button>
    </div>
  </header>

  <div class="container">
    <h1>Nhận diện Tiền Xu</h1>
    <div class="button-group">
      <label for="upload" class="button purple">📷 Chọn ảnh</label>
      <input type="file" id="upload" accept="image/*" class="hidden" onchange="uploadImageBoth()">

      <button id="open-webcam" class="button blue">📸 Mở Webcam</button>
      <button id="capture" class="button red hidden">📷 Chụp</button>
    </div>

    <div class="result-container">
      <div class="image-preview">
        <video id="webcam" class="hidden" autoplay></video>
        <img id="coin-image" class="hidden" alt="Hình ảnh tiền xu">
      </div>
      <div class="text-box">
        <p id="info">Thông tin...</p>
      </div>
    </div>

    <div class="chat-answer-box">
      <p id="chat-answer" class="text-xl mt-4">Thông tin chi tiết...</p>
    </div>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
