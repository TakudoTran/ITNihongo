<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    use HasFactory;
    public function Post()
    {
        return $this->belongsTo(SharingPost::class, 'post_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function PostComment()
    {
        return $this->belongsTo(PostComment::class, 'comment_id');
    }
}
