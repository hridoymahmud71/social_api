<?php

namespace App\Utility;

use App\Models\Post;

use DB;

class PostUtility
{
    public static function create_personal_post($request_data)
    {

        try {
            \DB::beginTransaction();

            $post =  auth()->user()->posts()->create([
                'content'        => $request_data['post_content'],
            ]);

            // in case more dependent tables are needed , insert from here

            \DB::commit();
        } catch (\Exception  $e) {
            //dd($e);

            \DB::rollback();
            return null;
        } catch (\Throwable $th) {
            //dd($th);

            \DB::rollback();
            return null;
        }

        // if everything goes alright
        return $post;
    }

    public static function create_page_post($request_data,$page)
    {

        try {
            \DB::beginTransaction();

            $post =  $page->posts()->create([
                'content'  => $request_data['post_content'],
            ]);

            // in case more dependent tables are needed , insert from here

            \DB::commit();
        } catch (\Exception  $e) {
            //dd($e);

            \DB::rollback();
            return null;
        } catch (\Throwable $th) {
            //dd($th);

            \DB::rollback();
            return null;
        }

        // if everything goes alright
        return $post;
    }
}
