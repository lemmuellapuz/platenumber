<?php

namespace App\Http\Controllers\Web\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Authentication\SigninRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    
    public function signin(SigninRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $request->session()->regenerate();

            return response([
                'user' => Auth::user()
            ], 201);
        }

        return response()->json([
            'message' => 'Invalid Credentials'
        ], 401);
    }
    
    public function signout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response([
            'message' => 'Signed out'
        ], 204);
    }

}
