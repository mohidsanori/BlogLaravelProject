<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';
    protected $fillable = [
        'blog_id',
        'user_id',
        'comment_body'
    ];

    public function Blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
