<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông tin tài khoản</title>
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
      <a href="/dashboard">🏠 Trang chủ</a>
      <a href="/posts">📜 Bài viết</a>
      <a href="http://192.168.1.100:8000/about">📖 Giới thiệu</a>
      <a href="/account" class="font-bold text-purple-700">👤 Tài khoản</a>
    </nav>
    <div class="user-options">
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      <button class="btn-logout" onclick="document.getElementById('logout-form').submit();">🔑 Đăng Xuất</button>
    </div>
  </header>

  <!-- Nội dung chỉnh sửa tài khoản -->
  <div class="container max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-center text-white-700">Cập nhật thông tin tài khoản</h1>
    @if ($user->image)
        <div class="flex justify-center">
          <img src="{{ asset('storage/' . $user->image) }}" alt="Avatar" class="mt-2 h-40 w-40 rounded-full object-cover">
        </div>
      @endif
    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
      @csrf

      <div>
        <label class="block font-medium mb-1">Họ và tên</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded px-3 py-2 text-black" required>
      </div>

      <div>
        <label class="block font-medium mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded px-3 py-2 text-black" required>
      </div>

      <div>
        <label class="block font-medium mb-1">Số điện thoại</label>
        <input type="text" name="SDT" value="{{ old('SDT', $user->SDT) }}" class="w-full border rounded px-3 py-2 text-black">
      </div>

      <div>
        <label class="block font-medium mb-1">Mật khẩu mới</label>
        <input type="password" name="password" class="w-full border rounded px-3 py-2 text-black" placeholder="Để trống nếu không thay đổi">
      </div>

      <div>
        <label class="block font-medium mb-1">Xác nhận mật khẩu</label>
        <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2 text-black">
      </div>

      <!-- Ảnh đại diện nằm dưới các input và lớn hơn -->
      <div class="flex justify-center mt-6">
        <label class="block font-medium mb-1">Ảnh đại diện</label>
      </div>
      <div class="flex justify-center">
        <input type="file" name="image" class="w-full max-w-xs border rounded px-3 py-2 text-black mb-4">
      </div>
      
      <div class="text-center">
        <button type="submit" class="bg-purple-700 hover:bg-purple-800 px-6 py-2 rounded text-white">💾 Lưu thay đổi</button>
      </div>
    </form>
  </div>

  <!-- Footer -->
  <div class="footer mt-10 text-center text-sm text-gray-500">
    <p>&copy; 2025 Coins Master</p>
    <p>Liên hệ: nh3571412@gmail.com</p>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
