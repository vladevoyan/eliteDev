<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;


class UserController extends Controller
{
    public function register (RegisterRequest $request){
        $inputs = $request->all();
        $inputs["password"] = bcrypt($inputs["password"]);
        $user = User::create($inputs);
        $user["token"] = $user->createToken("Elit Dev Task")->accessToken;

        return response()->json(["success" => true, "user" => $user]);
    }

    public function login (LoginRequest $request){
  
        if (auth()->attempt($request->all())) {
            $user = auth()->user();
            $user["token"] = auth()->user()->createToken("Elit Dev Task")->accessToken;
            return response()->json(["success" => true,"token" => $user]);
        } else {
            return response()->json(["success" => false,"error" => "Unauthorised"], 401);
        }
    }
}
