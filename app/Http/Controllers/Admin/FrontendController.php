<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Category;

use App\Models\LikeDislike;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $all_categories = Category::get();
        $latest_blogs = Blog::orderBy('created_at', 'DESC')->get()->take(15);
        return view('dashboard', compact('all_categories', 'latest_blogs'));
    }

    public function viewCategory(string $category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $blog = Blog::where('category_id', $category->id)->get();
            return view('user.category', compact('blog', 'category'));
        } else {
            return redirect('dashboard');
        }
    }

    public function viewBlog(string $category_slug, string $blog_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $latest_comment = Comment::orderBy('created_at', 'DESC')->get()->take(15);
            $blog = Blog::where('category_id', $category->id)->where('slug', $blog_slug)->first();
            return view('user.blog', compact('blog', 'latest_comment'));
        } else {
            return redirect('dashboard');
        }
    }

    
}
