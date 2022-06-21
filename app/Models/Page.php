<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->morphMany(Post::class, 'postable');
    }

    // users that follow this page
    public function followers()
    {
        return $this->belongsToMany(User::class, 'page_followers', 'page_id', 'follower_id');
    }
}
