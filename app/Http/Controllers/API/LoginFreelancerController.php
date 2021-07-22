<?php 

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use JWTAuth;
use Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginFreelancerController extends Controller
{
    public function login(Request $request)
    {
        try {
            if (! $token = JWTAuth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => '2'])) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'),201);
    }

    public function refresh_token(Request $request)
    {
        ///return JWTAuth::getToken();
        try {
            if (! $token = JWTAuth::refresh(JWTAuth::getToken())) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'),201);
    }
}