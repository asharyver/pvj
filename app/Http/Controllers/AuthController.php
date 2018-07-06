<?php

namespace App\Http\Controllers;

use Auth;
use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('telepon', 'password');

        if (($user = DB::table('users')->select('password')->where('telepon', $request->input('telepon'))->latest()->first()) === null) {
            return response([
                'status' => 'error',
                'error'  => 'email.not.exist',
                'msg'  => 'No Handphone not found !'
            ], 400);
        } elseif ( ! Hash::check($request->input('password'), $user->password)) {
            return response([
                'status' => 'error',
                'error'  => 'password.wrong',
                'msg'    => 'Password wrong !'
            ], 400);
        }

        if ( ! $token = JWTAuth::attempt($credentials)) {
            return response([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'No Handphone or password wrong !'
            ], 400);
        }

        return response([
            'status' => 'success'
        ])
            ->header('Authorization', $token);
    }

    public function logout()
    {
        JWTAuth::invalidate();

        return response([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);

        return response([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function refresh()
    {
        return response([
            'status' => 'success'
        ]);
    }
}
