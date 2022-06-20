<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Utility\UserUtility;
use Auth;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {


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

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['result' => false, 'message' => 'Login Failed', 'user' => null], 401);
        }

        return $this->login_success(
            auth()->user()->createToken('API Token')->plainTextToken,
            auth()->user()
        );
    }

    public function logout()
    {

        try {

            if (request()->from_everywhere && request()->from_everywhere == 'yes') {
                auth()->user()->tokens()->delete();
            } else {
                auth()->user()->currentAccessToken()->delete();
            }


            return response()->json(
                [
                    'result' => true,
                    'message'   => 'Successfully logged out'
                ],
                200
            );
        } catch (\Exception $e) {

            return response()->json(
                [
                    'result' => false,
                    'message'   => 'Log out error'
                ],
                200
            );
        } catch (\Throwable $th) {

            return response()->json(
                [
                    'result' => false,
                    'message'   => 'Log out error'
                ],
                200
            );
        }
    }
}
