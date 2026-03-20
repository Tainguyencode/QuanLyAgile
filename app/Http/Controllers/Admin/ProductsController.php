<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\admin\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $modelProducts;
    private $modelCategory;
    public function __construct()
    {
        $this->modelProducts = new Products();
        $this->modelCategory = new Category();
    }
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $query = $this->modelProducts->query();

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        // lọc danh mục
        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        // lọc giá (chuẩn, không trùng)
        if ($request->price_range) {
            switch ($request->price_range) {
                case 'under_50':
                    $query->where('price', '<', 50000.00);
                    break;

                case '50_100':
                    $query->where('price', '>', 50000.00)
                        ->where('price', '<=', 100000.00);
                    break;
                case '100_200':
                    $query->where('price', '>', 100000.00);
                    break;
            }
        }

        $products = $query->with('category')->paginate(10);
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->modelCategory->getAll();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ], [
            'name.required' => 'Tên sản phẩm không được để trống',
            'price.required' => 'Giá sản phẩm không được để trống',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'quantity.integer' => 'Số lượng phải là số nguyên',
            'quantity.min' => 'Số lượng không được nhỏ hơn 0',
            'image.required' => 'Vui lòng chọn ảnh sản phẩm',
        ]);
        $imagePath = null;

        // Xử lý ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imagePath);
        }
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'quantity' => $request->quantity
        ];
        $this->modelProducts->insertProducts($data);
        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->modelProducts->findByid($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = $this->modelCategory->getAll();
        $products = $this->modelProducts->findByid($id);
        return view('admin.products.edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:0',
        ], [
            'name.required' => 'Tên sản phẩm không được để trống',
            'price.required' => 'Giá sản phẩm không được để trống',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'quantity.integer' => 'Số lượng phải là số nguyên',
            'quantity.min' => 'Số lượng không được nhỏ hơn 0',
        ]);
        $product = $this->modelProducts->findByid($id);
        $imagePath = $product->image ?? null;
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ
            $oldImage = public_path('uploads/products/' . $product->image);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            // upload ảnh mới
            $image = $request->file('image');
            $imagePath = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imagePath);
        }
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'quantity' => $request->quantity
        ];
        $this->modelProducts->updateProducts($id, $data);
        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->modelProducts->findById($id);
        $imagePath = public_path('uploads/products/' . $product->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $this->modelProducts->deleteProducts($id);
        return redirect()->route('products');
    }
}
