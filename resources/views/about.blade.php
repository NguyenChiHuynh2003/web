<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giới thiệu</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <!-- Header -->
  <header class="header">
    <div class="logo">
      <img src="{{ asset('storage/logo.jpg') }}" alt="Logo" class="logo-img">
      <span class="app-name">Coins Master</span>
    </div>
    <nav class="nav">
      <a href="http://192.168.1.100:8000/dashboard">🏠 Trang chủ</a>
      <a href="http://192.168.1.100:8000/posts">📜 Bài viết</a>
      <a href="http://192.168.1.100:8000/about" class="font-bold text-purple-700">📖 Giới thiệu</a>
      <a href="http://192.168.1.100:8000/account">👤 Tài khoản</a>
    </nav>
    <div class="user-options">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      <button class="btn-logout" onclick="document.getElementById('logout-form').submit();">🔑 Đăng Xuất</button>
    </div>
  </header>
  <div class="text-center mt-6">
      <img src="{{ asset('storage/logo.jpg') }}" alt="Coins Master" class="w-40 h-40 rounded-full mx-auto shadow-md">
    </div>
  <!-- Nội dung Giới thiệu -->
  <div class="container max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-3xl font-bold mb-4 text-center text-white-700">Giới thiệu Coins Master</h1>
    <p class="text-white-700 leading-7">
      Chào mừng bạn đến với <strong>Coins Master</strong> – nền tảng chia sẻ bài viết, kinh nghiệm và tin tức liên quan đến tiền xu các nước.
      <br><br>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat tenetur cumque ipsum obcaecati quia, dolore tempore. Non suscipit culpa odit dignissimos vitae deserunt neque, maxime voluptas in. Id, minima velit.
      <br><br>
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus, nostrum dolor nam eius iusto maiores minus quia, doloribus similique fugiat ipsa? Vero facilis ipsum eos in ratione dolore quaerat corrupti.
    </p>
 
  </div>

  <!-- Footer -->
  <div class="footer mt-10 text-center text-sm text-gray-500">
    <p>&copy; 2025 Coins Master</p>
    <p>Liên hệ: nh3571412@gmail.com</p>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
