<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Phương thức index để hiển thị danh sách bài viết
    public function index()
    {
        $posts = Post::all();
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
