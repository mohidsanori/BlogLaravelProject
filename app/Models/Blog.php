<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\LikeDislike;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'category_id',
        'heading',
        'slug',
        'description',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id', 'id')->whereNull('parent_id');
    }

    // Likes
    public function likes()
    {
        return $this->hasMany(LikeDislike::class, 'blog_id', 'id')->sum('like');
    }

    // Dislikes
    public function dislikes()
    {
        return $this->hasMany(LikeDislike::class, 'blog_id', 'id')->sum('dislike');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
