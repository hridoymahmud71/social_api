<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;


class FeedController extends Controller
{
    public function feed()
    {
        $page = Page::find(1);
        $user = User::find(2);

        dd($page->followers()->get(),'\n',$user->pages_following()->get());
    }
}
