<?php
// app/Http/Controllers/PostController.php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Phương thức index để hiển thị danh sách bài viết
    public function index(Request $request)
    {
        $query = Post::query();

        // Kiểm tra nếu có tham số tìm kiếm
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', '%' . $search . '%') // Tìm kiếm theo tiêu đề
                  ->orWhere('content', 'like', '%' . $search . '%'); // Tìm kiếm theo nội dung
        }

        // Lấy các bài viết đã lọc
        $posts = $query->get();

        // Trả về view với danh sách bài viết
        return view('posts.index', compact('posts'));
    }

    // Phương thức show để hiển thị bài viết chi tiết
    public function show($id)
    {
        // Tìm bài viết theo ID
        $post = Post::findOrFail($id);
        
        // Trả về view với dữ liệu bài viết chi tiết
        return view('posts.show', compact('post'));
    }
}
