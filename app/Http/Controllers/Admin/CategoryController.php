<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $modelCategory;

    public function __construct()
    {
        $this->modelCategory = new Category();
    }

    // Danh sách category
    public function index()
    {
        $categories = $this->modelCategory->getAll();
        return view('admin.category.index', compact('categories'));
    }

    // Form thêm
    public function create()
    {
        return view('admin.category.create');
    }

    // Lưu category mới
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'image' => $request->image,
            'created_at' => now()
        ];

        $this->modelCategory->insertCategory($data);

        return redirect()->route('admin.category.index')
                ->with('success','Thêm category thành công');
    }

    // Xem chi tiết
    public function show(string $id)
    {
        $category = $this->modelCategory->findByid($id);
        return view('admin.category.show', compact('category'));
    }

    // Form sửa
    public function edit(string $id)
    {
        $category = $this->modelCategory->findByid($id);
        return view('admin.category.edit', compact('category'));
    }

    // Cập nhật
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => $request->name,
            'image' => $request->image,
            'created_at' => now()
        ];

        $this->modelCategory->updateCategory($id, $data);

        return redirect()->route('admin.category.index')
                ->with('success','Cập nhật category thành công');
    }

    // Xóa
    public function destroy(string $id)
    {
        $this->modelCategory->deleteCategory($id);

        return redirect()->route('admin.category.index')
                ->with('success','Xóa category thành công');
    }
}