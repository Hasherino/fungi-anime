<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmEmail;
use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Str;

class AuthController extends Controller
{
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if(!auth()->user()->email_confirmed) {
            return response()->json(['error' => 'Email not confirmed'], 401);
        }

        $session_id = Str::random(20);

        session(['id' => $session_id]);

        Token::create([
            'value' => $token,
            'session_id' => $session_id,
        ]);

        return redirect("/");
    }

    public function register()
    {
        $data = request([
            'first_name',
            'last_name',
            'nickname',
            'birthday',
            'email',
            'password',
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        \Mail::to($data['email'])->send(new ConfirmEmail($user->id));

        return redirect("/");
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        Token::where('session_id', session('id'))->delete();

        return redirect("/");
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
