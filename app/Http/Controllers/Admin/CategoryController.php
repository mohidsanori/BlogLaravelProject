<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();
        $category = new Category;
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->save();

        return redirect('admin/category')->with('message', 'Category Added Successfully!');
    }

    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category_id)
    {
        $data = $request->validated();
        $category = Category::find($category_id);
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->update();

        return redirect('admin/category')->with('message', 'Category Updated Successfully!');
    }

    public function destroy($category_id)
    {
        $category = Category::find($category_id);
        $category->blogs()->delete();
        $category->delete();
        return redirect('admin/category')->with('message', 'Category & All Related Blogs Are Deleted Successfully!');
    }
}
