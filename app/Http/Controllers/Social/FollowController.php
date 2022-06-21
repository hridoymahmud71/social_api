<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;
use App\Models\PageFollower;
use App\Models\UserFollower;
use App\Utility\FollowUtility;

class FollowController extends Controller
{
    public function follow_person($user_id)
    {
        $user = User::find($user_id);

        if ($user == null) {
            return response()->json(['result' => false, 'message' => 'Could not found user'], 404);
        }

        // user should follow own self        
        if (auth()->user()->id == $user_id) {
            return response()->json(['result' => false, 'message' => 'User should follow own self']);
        }

        // check if already following
        if (UserFollower::where('follower_id', auth()->user()->id)->where('following_id', $user->id)->exists()) {
            return response()->json(['result' => false, 'message' => 'Already follow this user']);
        }

        $followed =  FollowUtility::follow_user($user);

        if (!$followed) {
            return response()->json(['result' => false, 'message' => 'Could not follow'], 404);
        }

        return response()->json(['result' => false, 'message' => 'Successfully following']);
    }

    public function follow_page($page_id)
    {
        $page = Page::find($page_id);

        if ($page == null) {
            return response()->json(['result' => false, 'message' => 'Could not found page'], 404);
        }

        // user should not follow own page        
        if (auth()->user()->id == $page->user_id) {
            return response()->json(['result' => false, 'message' => 'User should not follow own page']);
        }

        // check if already following
        if (PageFollower::where('follower_id', auth()->user()->id)->where('page_id', $page->id)->exists()) {
            return response()->json(['result' => false, 'message' => 'Already follow this page']);
        }

        $followed =  FollowUtility::follow_page($page);

        if (!$followed) {
            return response()->json(['result' => false, 'message' => 'Could not follow'], 404);
        }

        return response()->json(['result' => false, 'message' => 'Successfully following']);
    }
}
