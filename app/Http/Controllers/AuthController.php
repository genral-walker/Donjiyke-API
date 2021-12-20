<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller       
{

    public function index()
    {
        return User::all();
    }
    /*
     $newImageName = time().'-'.$request->name . '.'.$request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        // In creating a user //'image_path' => $newImageName,
    */

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Invalid email or password.'
            ], 401);
        }
  
        $token = $user->createToken('myapptoken')->plainTextToken;
    
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }



    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }


    public function create(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'
        ]);

        if (User::count() >= 5) {
            return response([
                'message' => 'Maximum number of users reached.'
            ], 403);
        }


        $user = User::create([
            'role' => 'staff',
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])     
        ]);


        $response = [
            'user' => $user
        ];

        return response($response, 201);
    }



    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        if ($request->has('password')) {
            $user->update(['password' => bcrypt($request->input('password'))]);
        }

        return $user;
    }


    public function destroy($id)
    {
        return User::destroy($id);
    }


    /*
    public function mail(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string'
        ]);


        // Check email
        $user = User::where('email', $fields['email'])->first();

        if (!$user) {
            return response([
                'message' => 'User does not exist!'
            ], 401);
        }

        $to      = $fields['email'];
        $subject = 'Password Recovery Mail';
        $message = '
          <div>
              <h2>Here Is your Password</h2>
              <br/>
              <ul style="font-size: 1.17em;">
                  <li><span>Name: </span><span>' . $_POST['name'] . '</span></li>
                  <li><span>Email: </span><span>' . $_POST['email'] . '</span></li>
                  <li><span>Subject: </span><span>' . $_POST['subject'] . '</span></li>
              </ul>

              <p>
             ' . $user->password . '
              </P>
          </div>
      ';

        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: Don Jiyke Inventory/Sales' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        if (mail($to, $subject, $message, $headers)) {
            return response([
                'message' => 'Email sent'
            ], 200);
        } else {
            return response([
                'message' => 'Email not sent'
            ], 408);
        }
    }

    */
}
