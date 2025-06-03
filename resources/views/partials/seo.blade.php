<!-- seo -->
@if(isset($pageConfig))
    {{-- Kiểm tra nếu là trang chủ --}}
    @if (Request::segment(1) == '')
        <meta name="description" content="{{ $pageConfig->site_description ?? 'Mô tả mặc định nếu không có' }}@yield('description')">
        <meta property="og:description" content="{{ $pageConfig->site_description ?? 'Mô tả mặc định nếu không có' }}@yield('description')">
        <meta name="twitter:description" content="{{ $pageConfig->site_description ?? 'Mô tả mặc định nếu không có' }}@yield('description')">
    @endif

    {{-- Nếu không phải là trang chủ --}}
    @if (Request::segment(1) != '')
        <meta name="description" content="@yield('description', $pageConfig->site_description)">
        <meta property="og:description" content="@yield('description', $pageConfig->site_description)">
        <meta name="twitter:description" content="@yield('description', $pageConfig->site_description)">
    @endif

    {{-- Hình ảnh cho SEO --}}
    <meta property="og:image" content="{{ secure_url('/file/img/logo') . '/' . $pageConfig->logo_path }}" />
    <meta itemprop="image" content="{{ secure_url('/file/img/logo') . '/' . $pageConfig->logo_path }}" />
    <meta property="og:image:secure_url" content="{{ secure_url('/file/img/logo') . '/' . $pageConfig->logo_path }}" />
    <meta property="og:image:alt" content="{{ $pageConfig->site_name }}" />

    {{-- Các thẻ meta SEO khác --}}
    <meta name="robots" content="all">
    <meta property="og:site_name" content="{{ $pageConfig->site_name }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{ $pageConfig->site_name }}">
    <meta name="twitter:title" content="@yield('title', $pageConfig->site_name)">
    <meta property="og:title" content="@yield('title', $pageConfig->site_name)" />

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ secure_url('/file/img/favicon') . '/' . $pageConfig->favicon }}">

    {{-- Title --}}
    <title>@yield('title', $pageConfig->site_name)</title>
@endif
<!-- seo -->
