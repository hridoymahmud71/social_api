<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'postable_type',
        'postable_id'
    ];

    public function postable()
    {
        return $this->morphTo();
    }
}
