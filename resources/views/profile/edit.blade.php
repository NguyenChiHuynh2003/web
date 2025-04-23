<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông tin tài khoản</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="bg-gray-100">

  <!-- Header -->
  <header class="bg-white shadow p-4 flex justify-between items-center">
    <div class="flex items-center gap-4">
      <img src="{{ asset('storage/logo.jpg') }}" alt="Logo" class="h-10 w-10 object-cover rounded-full">
      <span class="text-xl font-bold text-purple-700">Coins Master</span>
    </div>
    <nav class="space-x-4">
      <a href="/dashboard" class="text-gray-700 hover:text-purple-700">🏠 Trang chủ</a>
      <a href="/posts" class="text-gray-700 hover:text-purple-700">📜 Bài viết</a>
      <a href="http://192.168.1.100:8000/about" class="text-gray-700 hover:text-purple-700">📖 Giới thiệu</a>
      <a href="/account" class="font-bold text-purple-700">👤 Tài khoản</a>
    </nav>
    <div>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
      <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded" onclick="document.getElementById('logout-form').submit();">🔑 Đăng Xuất</button>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-center text-purple-700">Cập nhật thông tin tài khoản</h1>

    @if ($user->image)
      <div class="flex justify-center mb-4">
        <img src="{{ asset('storage/' . $user->image) }}" alt="Avatar" class="h-40 w-40 rounded-full object-cover">
      </div>
    @endif

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    @if($errors->any())
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc list-inside">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
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
        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full border rounded px-3 py-2 text-black">
      </div>

      <div>
        <label class="block font-medium mb-1">Ảnh đại diện mới</label>
        <input type="file" name="image" accept="image/*" class="w-full">
      </div>

      <div class="flex justify-end">
        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold px-6 py-2 rounded">Lưu thay đổi</button>
      </div>
    </form>
  </div>

</body>
</html>
