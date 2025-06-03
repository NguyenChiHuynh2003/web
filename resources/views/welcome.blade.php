<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  {{-- SEO Meta Tags --}}
  @include('partials.seo', ['pageConfig' => $pageConfig])

  {{-- Tên trang web fallback nếu không có trong seo --}}
  <title>@yield('title', $pageConfig->site_name ?? 'Coin Master')</title>

  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

  {{-- SweetAlert2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<main>
  <video autoplay muted loop id="myVideo">
    <source src="{{ asset('vid1.mp4') }}" type="video/mp4">
  </video>

  <header class="header">
    <button class="menu-toggle" onclick="toggleMenu()">☰</button>
    <div class="logo" onmouseenter="playLogoSound()" onmouseleave="stopLogoSound()">
      {{-- Hiển thị logo từ database --}}
      <img src="{{ asset('storage/' . $pageConfig->logo_path) }}" alt="Logo" class="logo-img">
      <span class="app-name">{{ $pageConfig->site_name ?? 'Coin Master' }}</span>
    </div>
    <nav class="nav">
      <a href="{{ url('/dashboard') }}">🏠 Trang chủ</a>
      <a href="{{ url('/posts') }}">📜 Bài viết</a>
      <a href="{{ url('/about') }}" class="font-bold text-purple-700">📖 Giới thiệu</a>
      <a href="{{ url('/account') }}">👤 Tài khoản</a>
      <a href="{{ url('/xu') }}">🪙 Xu cổ</a>
    </nav>
    <div style="margin-right: 5%" class="user-options">
      <a href="{{ url('/login') }}" class="button blue">Đăng nhập</a>
      <a href="{{ url('/register') }}" class="button green">Đăng ký</a>
    </div>
  </header>

  <div class="container">
    <h1>Nhận diện tiền xu</h1>
    <div class="button-group">
      <input type="file" id="upload" accept="image/*" multiple hidden onchange="uploadImageBoth()" />
      <button class="button purple" onclick="handleUploadClick()">Chọn ảnh</button>
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

<script>
  let uploadClickCount = 0;
  const MAX_UPLOAD_CLICKS = 1;

  function handleUploadClick() {
    if (uploadClickCount >= MAX_UPLOAD_CLICKS) {
      Swal.fire({
        title: 'Bạn đã hết lượt chọn ảnh!',
        text: 'Đăng nhập để có trải nghiệm đầy đủ nhất.',
        icon: 'info',
        confirmButtonText: 'Đăng nhập ngay',
        confirmButtonColor: '#4CAF50',
        showCancelButton: true,
        cancelButtonText: 'Để sau',
        cancelButtonColor: '#999'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "{{ url('/login') }}";
        }
      });
      return;
    }
    uploadClickCount++;
    document.getElementById('upload').click();
  }
</script>

</body>
</html>
