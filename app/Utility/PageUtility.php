<?php

namespace App\Utility;

use App\Models\Page;

use DB;

class PageUtility
{
    public static function create_page($request_data)
    {

        try {
            \DB::beginTransaction();

            $page = Page::create([
                'name'        => $request_data['page_name'],
                'user_id'     => auth()->user()->id,
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
        return $page;
    }
}
