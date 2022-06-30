<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Traits\imageUploadTrait;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use imageUploadTrait;
    public function showLogin(){
        return view('auth.login');
    }


    public function showRegister(){
        return view('auth.register');
    }

    public function RegisterAdmin(AuthUserRequest $request){

        $validated = $request ->validated();

        $validated['image'] = imageUploadTrait::uploadImage($request , 'image' , 'uploads/users');


        $validated['password'] = Hash::make($validated['password']);




        $user = User::create($validated);

        Auth::login($user);

        return redirect('/dashboard');

    }

  public function logout(){
    Auth::logout();
     return redirect('/');
  }

  public function login(LoginUserRequest $request){

    $validated = $request ->validated();

    if (Auth::attempt($validated)) {
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors('wrong in credentials email or password');
  }

}
