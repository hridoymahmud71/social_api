<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {


        // $messages = [
        //     'name.required' => 'Name is required',
        //     'name.max' => 'Maximum 255 characters for name',
        //     'email.required' => 'Email is required',
        //     'email.email' => 'Email must be a valid email address',
        //     'email.unique' => 'An user exists with this email',
        //     'password.required' => 'Password is required',
        //     'password.confirmed' => 'Password confirmation does not match',
        //     'password.min' => 'Minimum 6 digits required for password',
        // ];

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|unique:users,email',
        //     'password' => 'required|string|min:6|confirmed'
        // ], $messages);


        // if ($validator->fails()) {
        //     return response()->json(['result' => false, 'message' => 'Request is not valid', 'errors' => $validator->errors(), 'user' => null], 404);
        // }



        echo "register";
    }

    public function login(Request $request)
    {
        echo "login";
    }

    public function logout()
    {
        echo "logout";
    }
}
