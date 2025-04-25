<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nhận diện tiền xu AI</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <!-- Video background -->
  <video autoplay muted loop id="myVideo">
    <source src="{{ asset('vid1.mp4') }}" type="video/mp4">
    Trình duyệt không hỗ trợ video.
  </video>

  <!-- Âm thanh khi hover logo -->
  <audio id="logo-sound" src="{{ asset('storage/1.mp3') }}"></audio>

  <!-- Toàn bộ layout trong main -->
  <main style="position: relative; z-index: 1; display: flex; flex-direction: column; min-height: 100vh;">

    <!-- Header -->
    <header class="header">
       <div class="logo" onmouseenter="playLogoSound()" onmouseleave="stopLogoSound()">
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

    <!-- Container -->
    <div class="container">
      <h1 class="text-2xl font-bold mb-6 text-white">Nhận diện tiền xu</h1>

      <div class="button-group">
        <label for="upload" class="button purple cursor-pointer">📷Chọn ảnh</label>
        <input type="file" id="upload" accept="image/*" capture="environment" class="hidden" onchange="uploadImageBoth()">
        <button class="button red" onclick="clearResults()">🗑️ Xóa kết quả</button>
      </div>

      <div class="result-container">
        <div class="image-preview">
          <img id="coin-image" class="hidden" alt="Hình ảnh xu đã chọn">
        </div>
        <div class="text-box">
          <p id="info" class="text-white">Kết quả sẽ hiển thị ở đây</p>
        </div>
      </div>

      <div class="chat-answer-box">
        <p id="chat-answer" class="text-white">Thông tin chi tiết sẽ hiển thị tại đây...</p>
      </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
      <p>© 2025 Coins Master. Hệ thống nhận diện tiền xu bằng AI.</p>
      <p>Trường Đại học Nam Cần Thơ</p>
    </footer>

  </main>

  <!-- JavaScript -->
  <script src="{{ asset('js/script.js') }}"></script>

  <!-- Phát và dừng âm thanh khi hover logo -->
  <script>
    function playLogoSound() {
      const sound = document.getElementById('logo-sound');
      if (sound) {
        sound.currentTime = 0;
        sound.play();
      }
    }

    function stopLogoSound() {
      const sound = document.getElementById('logo-sound');
      if (sound) {
        sound.pause();
        sound.currentTime = 0;
      }
    }
  </script>
</body>
</html>
