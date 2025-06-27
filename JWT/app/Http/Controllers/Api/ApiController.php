<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller
{
    // Register API [name, email, password, password_confirmation]
    public function register(Request $request){

        $data = $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed"
        ]);

        User::create($data);

        return response()->json([
            "status" => true,
            "message" => "User Registered successfully"
        ]);
    }

    // Login API [email, password]
    public function login(Request $request){

        $data = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $token = auth()->attempt($data);

        if($token){

            return response()->json([
                "status" => true,
                "message" => "User logged in",
                "token" => $token
            ]);
        } else{

            return response()->json([
                "status" => false,
                "message" => "Invalid Credentials"
            ]);
        }
    }

    // Profile API
    public function profile(){

        $userdata = auth()->user();

        return response()->json([
            "status" => true,
            "message" => "User data",
            "data" => $userdata
        ]);
    }

    // Refresh Token API
    public function refreshToken(){

        $token = auth()->refresh();

        return response()->json([
            "status" => true,
            "message" => "Refresh Token",
            "new_token" => $token
        ]);
    }

    // Logout API
    public function logout(){

        auth()->logout();

        return response()->json([
            "status" => true,
            "message" => "User logged out"
        ]);
    }
}
