<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nhận diện tiền xu AI</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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

  <!-- Nội dung Giới thiệu -->
  <div class="container max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-3xl font-bold mb-4 text-center text-white-700">Giới thiệu dự án Nhận diện tiền xu AI</h1>
    <p class="text-white-700 leading-7">
      Chào mừng bạn đến với <strong>Coin Identifier</strong> – một dự án sử dụng công nghệ nhận dạng tiền xu AI để hỗ trợ bạn nhận diện và phân loại các đồng tiền từ các quốc gia trên toàn thế giới.
      <br><br>
      Dự án của chúng tôi kết hợp các mô hình học sâu (deep learning), đặc biệt là các mô hình CNN và YOLOv8, để xác định và phân biệt các đặc điểm của tiền xu, giúp người dùng có thể dễ dàng nhận dạng tiền xu trong thời gian thực.
      <br><br>
      Với sự hỗ trợ của API OpenAI, chúng tôi còn cung cấp các tính năng hỏi đáp thông minh, giúp người dùng không chỉ nhận diện tiền xu mà còn nhận được các thông tin chi tiết về chúng như quốc gia phát hành, năm phát hành, và các đặc điểm nổi bật khác.
      <br><br>
      Dự án không chỉ đơn giản là một công cụ nhận diện, mà còn là một nền tảng giáo dục, nơi người dùng có thể học hỏi về tiền xu, chia sẻ kinh nghiệm và mở rộng kiến thức về các đồng tiền trên thế giới.
      <br><br>
      Chúng tôi hi vọng rằng dự án này sẽ tạo ra một cộng đồng đam mê tiền xu, từ những người sưu tập, nghiên cứu đến những người yêu thích khám phá các nền văn hóa khác nhau qua những đồng tiền quý giá.
    </p>
  </div>

  <!-- Footer -->
  <div class="footer mt-10 text-center text-sm text-gray-500">
    <p>&copy; 2025 Coin Master</p>
    <p>Liên hệ: nh3571412@gmail.com</p>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
