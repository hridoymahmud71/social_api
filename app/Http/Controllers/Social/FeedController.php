<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeedCollection;
use App\Http\Resources\PostResource;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;


class FeedController extends Controller
{
    public function feed()
    {
        
        $post_query = Post::query();

        $followed_user_ids = auth()->user()->following()->get()->pluck('id')->toArray();
        $followed_page_ids =  auth()->user()->pages_following()->get()->pluck('id')->toArray();

        $post_query->whereHasMorph('postable', [User::class, Page::class], function ($query, $type) use ($followed_user_ids,$followed_page_ids) {
            if ($type === User::class) {
                $query->whereIn('postable_id', $followed_user_ids);
            }
            if ($type === Page::class) {
                $query->whereIn('postable_id', $followed_page_ids);
            }
        });


        $posts = $post_query->paginate(10);

        return new FeedCollection($posts);

        
    }
}
