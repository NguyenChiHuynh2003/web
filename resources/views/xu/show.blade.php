<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Chi tiết đồng xu - Coin Master</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <style>
    /* Style riêng cho bảng chi tiết đồng xu */
    .coin-detail-table {
      width: 100%;
      max-width: 700px;
      margin: 20px auto 40px auto;
      border-collapse: collapse;
      background: rgba(255,255,255,0.95);
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      overflow: hidden;
    }
    .coin-detail-table th,
    .coin-detail-table td {
      padding: 12px 16px;
      border-bottom: 1px solid #ddd;
      vertical-align: middle;
      text-align: left;
      color: #333;
    }
    .coin-detail-table th {
      background-color: #805ad5;
      color: white;
      font-weight: 600;
      text-align: center;
    }
    .coin-detail-table td.image-cell {
      text-align: center;
      width: 50%;
    }
    .coin-detail-table td.image-cell img {
      max-width: 220px;
      max-height: 220px;
      border-radius: 8px;
      object-fit: cover;
      box-shadow: 0 0 8px rgba(128, 90, 213, 0.4);
    }
    .back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      font-weight: 600;
      color: black;
      text-decoration: none;
    }
    .back-link:hover {
      text-decoration: underline;
    }

    /* Tăng khoảng cách giữa header và bảng chi tiết */
    section.coin-detail-section {
      margin-top: 120px; /* Khoảng cách lớn hơn */
    }
  </style>
</head>
<body>
  <main>
    <!-- Header -->
    <header class="header">
      <button class="menu-toggle" onclick="toggleMenu()">☰</button>

      <div class="logo" onmouseenter="playLogoSound()" onmouseleave="stopLogoSound()">
        <img src="{{ asset('storage/' . ($pageConfig->logo_path ?? 'default-logo.png')) }}" alt="Logo" class="logo-img">
        <span class="app-name">{{ $pageConfig->site_name ?? 'Coin Master' }}</span>
      </div>

      <nav class="nav">
        <a href="{{ url('/dashboard') }}">🏠 Trang chủ</a>
        <a href="{{ url('/posts') }}">📜 Bài viết</a>
        <a href="{{ url('/about') }}" class="font-bold text-purple-700">📖 Giới thiệu</a>
        <a href="{{ url('/account') }}">👤 Tài khoản</a>
        <a href="{{ url('/xu') }}">🪙 Xu cổ</a>
      </nav>

      <div class="user-options">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <button class="btn-logout" onclick="document.getElementById('logout-form').submit();">🔑 Đăng Xuất</button>
      </div>
    </header>

    <!-- Nội dung chi tiết đồng xu -->
    <section class="coin-detail-section">

      <table class="coin-detail-table" role="table" aria-label="Chi tiết đồng xu">
        <thead>
          <tr>
            <th colspan="2">Hình ảnh</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="image-cell">
              <img src="{{ asset($coin->anh_mt) }}" alt="Mặt trước đồng xu">
              <p>Mặt trước</p>
            </td>
            <td class="image-cell">
              <img src="{{ asset($coin->anh_ms) }}" alt="Mặt sau đồng xu">
              <p>Mặt sau</p>
            </td>
          </tr>
        </tbody>

        <thead>
          <tr>
            <th>Thuộc tính</th>
            <th>Giá trị</th>
          </tr>
        </thead>
        <tbody>
            <td><strong>Mã</strong></td>
            <td>{{ $coin->ma }}</td>
          </tr>
          <tr>
            <td><strong>Chất liệu</strong></td>
            <td>{{ $coin->chat_lieu }}</td>
          </tr>
          <tr>
            <td><strong>Phân loại</strong></td>
            <td>{{ $coin->phan_loai }}</td>
          </tr>
          <tr>
            <td><strong>Niên đại</strong></td>
            <td>{{ $coin->nien_dai }}</td>
          </tr>
          <tr>
            <td><strong>Mô tả</strong></td>
            <td>{{ $coin->mo_ta }}</td>
          </tr>
        </tbody>
      </table>

      <a href="{{ url('/xu') }}" class="back-link">← Quay lại danh sách</a>
    </section>

    <!-- Footer -->
    <footer class="footer">
      <p>© 2025 Coins Master. Hệ thống nhận diện tiền xu bằng AI.</p>
      <p>Trường Đại học Nam Cần Thơ</p>
    </footer>
  </main>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
