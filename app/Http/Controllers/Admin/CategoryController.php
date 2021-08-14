<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $listCategory = Category::all();

        return view('admin/categories/index', [
            'data' => $listCategory,
        ]);
    }
    public function show(Category $category)
    {
        return view('admin.categories.show', [
            'category' => $category,
        ]);
    }
    public function create()
    {
        return view('admin/categories/create');
    }
    public function store(Request $request)
    {
        $inputs = $request->only('name');

        $rules = [
            'name' => 'required|unique:categories'
        ];
        $messages= [
            'required' => ':attribute ko được để trống',
            'name.max' =>'Tên danh mục không được quá 100 kí tự ',
            
        ];

        $attributes = [
            'name' => 'Tên danh mục',
        ];

        $request->validate($rules, $messages, $attributes);
        Category::create($inputs);

        return redirect()->route('admin.categories.index');
    }
    public function edit(Category $category)
    {
        return view('admin/categories/edit', [
            'data' => $category,
        ]);
    }
    public function update(Request $request, $category)
    {

        $inputs = $request->only('name');

        $rules = [
            'name' => 'required|unique:categories,name,' . $category,
        ];

        $messages= [
            'required' => ':attribute ko được để trống',
            'name.max' =>'Tên danh mục không được quá 100 kí tự ',
            
        ];

        $attributes = [
            'name' => 'Tên danh mục',
        ];

        $request->validate($rules, $messages, $attributes);
        $category = Category::findOrFail($category);

        $category->fill($inputs);
        $category->save();

        return redirect()->route('admin.categories.index');
    }
    public function delete($category)
    {
        Category::findOrFail($category)->delete();
        return redirect()->route('admin.categories.index');
    }
}
