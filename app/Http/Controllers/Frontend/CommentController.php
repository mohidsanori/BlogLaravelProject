<?php

namespace App\Http\Controllers\frontend;

use App\Models\Blog;
use App\Models\Reply;

use App\Models\Comment;
use App\Models\LikeDislike;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|string'
            ]);
            // if ($validator->fails) {
            //     return redirect()->back()->with('message', 'COMMENT AREA IS MANDETORY!');
            // }
            $blog = Blog::where('slug', $request->blog_slug)->first();
            if ($blog) {
                //$comment = new Comment;
                Comment::create([
                    'blog_id' => $blog->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);
                //$comment->save();
                return redirect()->back();
            } else {
                return redirect()->back()->with('message', 'No such post found!');
            }
        } else {
            return redirect('login')->with('message', 'Login first to comment');
        }
    }

    // public function reply(Request $request)
    // {
    //     if (Auth::check()) {
    //         Reply::create([
    //             'comment_id' => $request->input('comment_id'),
    //             'name' => $request->input('name'),
    //             'reply' => $request->input('reply'),
    //             'user_id' => Auth::user()->id
    //         ]);

    //         return redirect()->route('home')->with('success', 'Reply added');
    //     }

    //     return back()->withInput()->with('error', 'Something wronmg');
    // }

    public function save_likedislike(Request $request)
    {
        $data = new LikeDislike;
        $data->blog_id = $request->blog_id;
        $data->user_id =  Auth::user()->id;
        if ($request->type == 'like') {
            $data->like = 1;
        } else {
            $data->dislike = 1;
        }

        $data->save();
        return redirect()->back();
    }
}
