<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Page;

class WebController extends Controller
{
    // Hàm lấy cấu hình trang web đang kích hoạt
    private function getPageConfig()
    {
        return Page::where('is_active', true)->first(); // Lấy cấu hình trang web đang kích hoạt
    }

    public function index()
    {
        // Lấy cấu hình trang web
        $pageConfig = $this->getPageConfig();

        // Trả về view cho trang chủ và truyền thông tin cấu hình vào
        return view('welcome', compact('pageConfig'));
    }

    public function about()
    {
        // Lấy cấu hình trang web
        $pageConfig = $this->getPageConfig();

        // Trả về view cho trang giới thiệu và truyền thông tin cấu hình vào
        return view('about', compact('pageConfig'));
    }

    public function posts()
    {
        // Lấy danh sách bài viết
        $posts = Post::latest()->get();

        // Lấy cấu hình trang web
        $pageConfig = $this->getPageConfig();

        return view('posts.index', [
            'posts' => $posts,
            'pageConfig' => $pageConfig,
        ]);
    }

    public function show($postId)
    {
        // Lấy cấu hình trang web
        $pageConfig = $this->getPageConfig();

        // Lấy bài viết theo ID
        $post = Post::findOrFail($postId);

        return view('posts.show', compact('post', 'pageConfig'));
    }

    public function dashboard()
    {
        // Lấy cấu hình trang web
        $pageConfig = $this->getPageConfig();

        // Trả về view cho trang dashboard và truyền thông tin cấu hình vào
        return view('dashboard', compact('pageConfig'));
    }

    public function xu()
    {
        $pageConfig = $this->getPageConfig();
        return view('xu', compact('pageConfig'));
    }

    public function account()
    {
        // Lấy thông tin cấu hình trang web từ cơ sở dữ liệu
        $pageConfig = Page::first();

        // Lấy thông tin người dùng đã đăng nhập
        $user = auth()->user();

        // Trả về view cho trang tài khoản và truyền thông tin cấu hình vào
        return view('account', compact('pageConfig', 'user'));
    }
}
