<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
        echo "register";
    }

    public function login(Request $request){
        echo "login";
    }

    public function logout(){
        echo "logout";
    }
}
