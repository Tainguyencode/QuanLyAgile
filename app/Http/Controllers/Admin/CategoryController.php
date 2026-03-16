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

    // Danh sách
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

    // Lưu category
    public function store(Request $request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imagePath = time().'.'.$image->getClientOriginalExtension();

            $image->move(public_path('uploads/categories'), $imagePath);
        }

        $data = [
            'name' => $request->name,
            'image' => $imagePath,
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

    // Update
    public function update(Request $request, string $id)
    {
        $category = $this->modelCategory->findByid($id);

        $imagePath = $category->image;

        if ($request->hasFile('image')) {

            // xóa ảnh cũ
            $oldImage = public_path('uploads/categories/'.$category->image);

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            // upload ảnh mới
            $image = $request->file('image');
            $imagePath = time().'.'.$image->getClientOriginalExtension();

            $image->move(public_path('uploads/categories'), $imagePath);
        }

        $data = [
            'name' => $request->name,
            'image' => $imagePath,
        ];

        $this->modelCategory->updateCategory($id, $data);

        return redirect()->route('admin.category.index')
                ->with('success','Cập nhật category thành công');
    }

    // Xóa
    public function destroy(string $id)
    {
        $category = $this->modelCategory->findByid($id);

        $oldImage = public_path('uploads/categories/'.$category->image);

        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        $this->modelCategory->deleteCategory($id);

        return redirect()->route('admin.category.index')
                ->with('success','Xóa category thành công');
    }
}