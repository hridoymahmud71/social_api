<?php

namespace App\Utility;

use App\Models\User;

use DB;

class UserUtility
{
    public static function create_user($request_data)
    {

        try {
            \DB::beginTransaction();

            $user = User::create([
                'first_name'        => $request_data['first_name'],                
                'last_name'         => $request_data['last_name'],                
                'password'          => bcrypt($request_data['password']),
                'email'             => $request_data['email'],
                'email_verified_at' => date("Y-m-d H:i:s")      ,
            ]);

            // in case more dependent tables are needed , insert from here



            \DB::commit();
        } catch (\Exception  $e) {
            dd($e);
            
            \DB::rollback();
            return null;
        } catch (\Throwable $th) {
            dd($th);
            
            \DB::rollback();
            return null;
        }

        // if everything goes alright
        return $user;
    }
}
