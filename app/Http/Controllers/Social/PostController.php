<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Http\Requests\Social\PostCreateRequest;
use App\Utility\PostUtility;
use App\Models\Page;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function create_personal_post(PostCreateRequest $request)
    {
        $post =  PostUtility::create_personal_post($request->all());

        if ($post == null) {
            return response()->json(['result' => false, 'message' => 'Could not create post'], 404);
        }

        return response()->json(['result' => true, 'message' => 'Post created'], 200);
    }

    public function create_page_post(PostCreateRequest $request, $page_id)
    {

        $page = Page::find($page_id);

        if ($page == null) {
            return response()->json(['result' => false, 'message' => 'Could not found page'], 404);
        }


        // user should not post from somebody else's page
        //dd(auth()->user()->id , $page->user_id);
        if (auth()->user()->id != $page->user_id) {
            return response()->json(['result' => false, 'message' => 'Unauthorized'], 401);
        }

        $post =  PostUtility::create_page_post($request->all(),$page);

        if ($post == null) {
            return response()->json(['result' => false, 'message' => 'Could not create post'], 404);
        }

        return response()->json(['result' => true, 'message' => 'Post created'], 200);
    }
}
