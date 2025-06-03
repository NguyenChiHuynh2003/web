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

  <main>
    <!-- Header -->
    <header class="header">
      <button class="menu-toggle" onclick="toggleMenu()">☰</button>
      <div class="logo" onmouseenter="playLogoSound()" onmouseleave="stopLogoSound()">
        <img src="{{ asset('storage/' . $pageConfig->logo_path) }}" alt="Logo" class="logo-img">
        <span class="app-name">{{ $pageConfig->site_name ?? 'Coin Master' }}</span>
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

    <!-- Nội dung -->
    <div class="container">
      <h1 class="text-2xl font-bold mb-6 text-white">Danh sách tiền xu</h1>
      <div class="mobile-scroll-wrapper">
        <table style="width: 100%; border-collapse: collapse; background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
          <thead style="background-color: #805ad5; color: white;">
            <tr>
              <th style="padding: 12px; border: 1px solid #ddd;">Niên đại</th>
              <th style="padding: 12px; border: 1px solid #ddd;">Mặt trước</th>
              <th style="padding: 12px; border: 1px solid #ddd;">Mặt sau</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dongXuList as $coin)
            <tr>
              <td style="padding: 10px; border: 1px solid #ddd;">{{ $coin->nien_dai }}</td>
              <td style="padding: 10px; border: 1px solid #ddd;">
                <a href="{{ route('xu.show', $coin->id) }}">
                  <img src="{{ asset($coin->anh_mt) }}" alt="MT" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                </a>
              </td>
              <td style="padding: 10px; border: 1px solid #ddd;">
                <a href="{{ route('xu.show', $coin->id) }}">
                  <img src="{{ asset($coin->anh_ms) }}" alt="MS" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <!-- Phân trang -->
    <div class="pagination-wrapper">
      @if ($dongXuList->lastPage() > 1)
      <ul class="pagination">
        <li class="page-item {{ ($dongXuList->currentPage() == 1) ? 'disabled' : '' }}">
          <a href="{{ $dongXuList->url(1) }}" class="page-link">«</a>
        </li>
        @for ($i = 1; $i <= $dongXuList->lastPage(); $i++)
          @if ($i >= $dongXuList->currentPage() - 2 && $i <= $dongXuList->currentPage() + 2)
            <li class="page-item {{ ($dongXuList->currentPage() == $i) ? 'active' : '' }}">
              <a href="{{ $dongXuList->url($i) }}" class="page-link">{{ $i }}</a>
            </li>
          @endif
        @endfor
        <li class="page-item {{ ($dongXuList->currentPage() == $dongXuList->lastPage()) ? 'disabled' : '' }}">
          <a href="{{ $dongXuList->url($dongXuList->currentPage() + 1) }}" class="page-link">»</a>
        </li>
      </ul>
      @endif
    </div>

    <!-- Footer -->
    <footer class="footer">
      <p>© 2025 Coins Master. Hệ thống nhận diện tiền xu bằng AI.</p>
      <p>Trường Đại học Nam Cần Thơ</p>
    </footer>
  </main>

  <!-- JavaScript -->
  <script src="{{ asset('js/script.js') }}"></script>
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
