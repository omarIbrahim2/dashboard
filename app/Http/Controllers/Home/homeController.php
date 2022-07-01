<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
         $users = User::select('name' , 'image' , 'email', 'phone' , 'age' , 'id')->where('role' , 'user')->paginate(10);
        return view('admin.home')->with([
            'users' => $users,
        ]);
    }
}
