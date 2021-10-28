<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            // 'name' => 'string|nullable',
            // 'image' => 'image|nullable|max: 1999',
            'role' => 'required|string',
            // 'mobile' => 'integer|size:11|nullable',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'
        ]);
      
        $user = User::create([
            'role' => $fields['role'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        // $token = $user->createToken('myapptoken')->plainTextToken;

        // $response = [
        //     'user' => $user,
        //     'token' => $token
        // ];

        $response = [
            'user' => $user
        ];

        return response($response, 201);
    }

    /*
     $newImageName = time().'-'.$request->name . '.'.$request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        // In creating a user //'image_path' => $newImageName,
    */ 

    // public function login(Request $request) {
    //     $fields = $request->validate([
    //         'email' => 'required|string',
    //         'password' => 'required|string'
    //     ]);

    //     // Check email
    //     $user = User::where('email', $fields['email'])->first();

    //     // Check password
    //     if(!$user || !Hash::check($fields['password'], $user->password)) {
    //         return response([
    //             'message' => 'Bad creds'
    //         ], 401);
    //     }

    //     $token = $user->createToken('myapptoken')->plainTextToken;

    //     $response = [
    //         'user' => $user,
    //         'token' => $token
    //     ];

    //     return response($response, 201);
    // }

    // public function logout(Request $request) {
    //     auth()->user()->tokens()->delete();

    //     return [
    //         'message' => 'Logged out'
    //     ];
    // }
}
