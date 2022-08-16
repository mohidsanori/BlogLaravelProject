<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\BlogFormRequest;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return view('admin.blog.index', compact('blog'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.blog.create', compact('category'));
    }

    public function store(BlogFormRequest $request)
    {
        $data = $request->validated();
        $blog = new Blog;
        $blog->category_id = $data['category_id'];
        $blog->heading = $data['heading'];
        $blog->slug = $data['slug'];
        $blog->description = $data['description'];
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/blog/', $filename);
            $blog->image = $filename;
        }
        // else{
        //     $file = $request->file('image');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $file->move('uploads/blog/', $filename);
        //     $blog->image = $filename;
        // }
        $blog->save();

        return redirect('admin/blog')->with('message', 'Blog Added Successfully!');
    }

    public function edit($blog_id)
    {
        $category = Category::all();
        $blog = Blog::find($blog_id);
        return view('admin.blog.edit', compact('blog', 'category'));
    }

    public function update(BlogFormRequest $request, $blog_id)
    {
        $data = $request->validated();
        $blog = Blog::find($blog_id);
        $blog->category_id = $data['category_id'];
        $blog->heading = $data['heading'];
        $blog->slug = $data['slug'];
        $blog->description = $data['description'];
        if ($request->hasfile('image')) {

            $destination = 'uploads/blog/' . $blog->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/blog/', $filename);
            $blog->image = $filename;
        }
        $blog->update();

        return redirect('admin/blog')->with('message', 'Blog Updated Successfully!');
    }

    public function destroy($blog_id)
    {
        $blog = Blog::find($blog_id);
        $blog->delete();
        unlink('uploads/blog/' . '/' . $blog->image);
        return redirect('admin/blog')->with('message', 'Blog Deleted Successfully!');
    }
}
