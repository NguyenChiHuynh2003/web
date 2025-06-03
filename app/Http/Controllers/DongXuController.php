<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Page;
// sửa import model đúng tên:
use App\Models\DongXuCollection;

class DongXuController extends Controller
{
    // Lấy cấu hình trang (ví dụ: tên trang, logo, ...)
    private function getPageConfig()
    {
        return Page::where('is_active', true)->first();
    }

    // Hiển thị danh sách các đồng xu, phân trang 10 dòng mỗi trang
    public function index()
    {
        // Dùng query builder lấy dữ liệu từ bảng 'dong_xu_collections'
        $dongXuList = DB::table('dong_xu_collections')->paginate(10);

        $pageConfig = $this->getPageConfig();

        return view('xu.index', compact('dongXuList', 'pageConfig'));
    }

    // Hiển thị chi tiết 1 đồng xu theo id
    public function show($id)
    {
        // Dùng model DongXuCollection để tìm kiếm theo id, nếu không có thì lỗi 404
        $coin = DongXuCollection::findOrFail($id);

        $pageConfig = $this->getPageConfig();

        return view('xu.show', compact('coin', 'pageConfig'));
    }
}
