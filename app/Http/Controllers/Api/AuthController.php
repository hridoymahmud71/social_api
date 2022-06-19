<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use App\Utility\UserUtility;
use Auth;
use App\Http\Resources\UserResource;

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

        $user =  UserUtility::create_user($request->all());

        if ($user == null) {
            return response()->json(['result' => false, 'message' => 'Could not create user', 'user' => null], 404);
        }

        // Creating auth so that we do not have to do a separate sign in
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['result' => false, 'message' => 'Auth Failed', 'user' => null], 401);
        }



        return $this->login_success(
            auth()->user()->createToken('API Token')->plainTextToken,
            auth()->user()
        );
    }

    protected function login_success($token, $user)
    {

        return response()->json(
            [
                'result' => true,
                'token'  => $token,
                'user'   => new UserResource($user),
                'message'   => 'Successfully logged in'
            ],
            200
        );
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
