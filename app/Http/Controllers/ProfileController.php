<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id) {
        $user = User::find($id);

        return view('profile.show', compact('user'));
    }

    public function search() {
        $query = request('query');
        $users = User::where('nickname', 'like', '%'.$query.'%')->get();
        $threads = Thread::where('title', 'like', '%'.$query.'%')->get();

        return view('search', compact('users', 'threads'));
    }

    public function update() {
        $data = request(['first_name', 'last_name', 'birthday']);

        User::find(auth()->id())->update($data);

        return redirect("/profile/".auth()->id());
    }

    public function destroy() {
        Token::where('session_id', session('id'))->first()->delete();

        User::find(auth()->id())->delete();

        return redirect("/");
    }

    public function confirm($id) {
        User::find($id)->update(['email_confirmed' => 1]);

        return redirect("/");
    }
}
