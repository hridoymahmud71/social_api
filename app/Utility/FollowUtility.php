<?php

namespace App\Utility;

use App\Models\Page;
use App\Models\User;

use DB;

class FollowUtility
{

    public static function follow_user($user)
    {

        try {
            \DB::beginTransaction();

            
           
            auth()->user()->following()->attach($user);

            // in case more dependent tables are needed , insert from here

            \DB::commit();
        } catch (\Exception  $e) {
            //dd($e);

            \DB::rollback();
            return false;
        } catch (\Throwable $th) {
            //dd($th);

            \DB::rollback();
            return false;
        }

        // if everything goes alright
        return true;
    }
}
