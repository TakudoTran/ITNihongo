<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SharingPost extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function detailImages(): HasMany
    {
        return $this->hasMany(PostImage::class, 'post_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(PostComment::class, 'post_id');
    }
    public function rate(): HasMany
    {
        return $this->hasMany(rate::class, 'post_id');
    }

    public function getCreatedAttribute(){
        return $this->attributes['created_at'];
    }
}
