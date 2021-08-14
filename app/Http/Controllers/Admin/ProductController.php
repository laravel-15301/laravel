<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $listProduct = Product::all();
        $listCategory = Category::all();

        return view('admin/products/index', [
            'data' => $listProduct,
            'categories' => $listCategory
        ]);
    }

    public function show(Product $product)
    {
        return view('admin.products.show', [
            'product' => $product,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin/products/create', compact('categories'));
    }

    public function store(Request $request)
    {
        $inputs = $request->only('name', 'price', 'quantity', 'image', 'category_id');
        $rules = [
            'name' => 'required|unique:products',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|numeric',
        ];
        $messages= [
            'required' => ':attribute ko được để trống',
            'name.max' =>'Họ tên không được quá 100 kí tự ',
            
        ];
    
        $attributes = [
            'name' => 'Họ tên',
            'price' => 'Giá',
            'quantity'=> 'Số lượng',
            'image'=> 'Ảnh',
        ];

    $request->validate($rules, $messages, $attributes);


        if ($request->isMethod('post')) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $folder_image = 'img';
                $imageName = $file->getClientOriginalName();
                $file->move($folder_image, $imageName);
            }
        }

        $inputs['image'] = $request->image->getClientOriginalName();

        Product::create($inputs);

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        $listCategory = Category::all();
        return view('admin/products/edit', [
            'data' => $product,
            'categories' => $listCategory
        ]);
    }

    public function update(Request $request, $product)
    {

        $inputs = $request->only('name', 'price', 'quantity', 'image', 'category_id');
        $rules = [
            'name' => 'required|unique:products,name,' . $product,
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_new' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|numeric',
        ];
            
        $messages= [
                'required' => ':attribute ko được để trống',
                'name.max' =>'Họ tên không được quá 100 kí tự ',
                
        ];
        
        $attributes = [
            'name' => 'Họ tên',
            'price' => 'Giá',
            'quantity'=> 'Số lượng',
            'image'=> 'Ảnh',
        ];

        $request->validate($rules, $messages, $attributes);

        if ($request->isMethod('patch')) {
            if ($request->hasFile('image_new')) {
                $file = $request->file('image_new');
                $folder_image = 'img';
                $imageName = $file->getClientOriginalName();
                $file->move($folder_image, $imageName);
            }
        }

        $inputs['image'] = $request->file() == null ? Product::where('id', $product)->first()->image : $request->image_new->getClientOriginalName();

        $category = Product::findOrFail($product);
        $category->fill($inputs);
        $category->save();

        return redirect()->route('admin.products.index');
    }
    
    public function delete($product)
    {
        Product::findOrFail($product)->delete();
        return redirect()->route('admin.products.index');
    }

    
}
