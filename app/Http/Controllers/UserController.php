<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserSignInRequest;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.manager');
    }

    public function signIn(StoreUserSignInRequest $request)
    {
        $user = DB::table('users')->where('name', $request['name'])->first();

        Auth::loginUsingId($user->id);

        return view('auth.manager',['user'=>$user]);
    }

    public function signOut() {

        Session::flush();
        Auth::logout();
        return Redirect('manager');
    }
}
