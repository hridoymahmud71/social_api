<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Http\Requests\Social\PageCreateRequest;
use App\Http\Resources\PageResource;
use App\Utility\PageUtility;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function create(PageCreateRequest $request)
    {      

        $page =  PageUtility::create_page($request->all());

        if ($page == null) {
            return response()->json(['result' => false, 'message' => 'Could not create the page', 'page' => null], 404);
        }

         return response()->json(['result' => true, 'message' => 'Page created', 'page' => new  PageResource($page)], 200);
    }
}
