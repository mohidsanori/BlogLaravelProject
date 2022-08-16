<?php

namespace App\Models;

use App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LikeDislike extends Model
{
    use HasFactory;

    protected $table = 'like_dislikes';
    protected $fillable = [
        'blog_id'
    ];

    public function Blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
