<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .logo-img {
            width: 150px; /* Điều chỉnh kích thước theo nhu cầu */
            height: auto; /* Giữ tỉ lệ */
    }
</style>
</head>
<body>
<img src="{{ asset('storage/logo.jpg') }}" alt="Logo" class="logo-img">
</body>
</html>