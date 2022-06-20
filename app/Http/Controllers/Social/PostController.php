<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Http\Requests\Social\PostCreateRequest;
use App\Utility\PostUtility;

class PostController extends Controller
{
    public function create_personal_post(PostCreateRequest $request)
    {
        $post=  PostUtility::create_personal_post($request->all());

        if ($post == null) {
            return response()->json(['result' => false, 'message' => 'Could not create post'], 404);
        }

        return response()->json(['result' => true, 'message' => 'Post created'], 200);

    }

    public function create_page_post(PostCreateRequest $request)
    {

        echo "page post";

    }
}
