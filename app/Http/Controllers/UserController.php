<?php

namespace App\Http\Controllers;

use App\Models\LoyalCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;


class UserController extends Controller
{
    public function postLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $token = Auth::guard('loyal_customer-api')->attempt($arr);
        if ($token) {

            $account = LoyalCustomer::where('email', $request->email)->first();
//            $authToken = $user->createToken('auth-token')->plainTextToken;

            return response()->json( [
                'data'=> Auth::guard('loyal_customer-api')->user(),
                'token'=> $token,
                'status'=> 200,
                'message'=> 'success login',
            ]);
        } else {

            return response()->json( [
                'data'=> "false",
                'status'=> 400,
                'message'=> 'false login',
            ]);
        }
    }

    public function checkLogin(Request $request)
    {
        $account = Auth::guard('loyal_customer-api')->user();

        return response()->json( [
            'data'=> $account,
            'checkPolicy'=> $account->can('viewAny', $account),
            'status'=> 200,
        ]);
    }

    public function checkAdminCreate()
    {
        return response()->json( [
            'data'=> "checkAdminCreate",
            'status'=> 200,
        ]);
    }

    public function checkUserCreate()
    {
        return response()->json( [
            'data'=> "checkAdminCreate",
            'status'=> 200,
        ]);
    }
}
