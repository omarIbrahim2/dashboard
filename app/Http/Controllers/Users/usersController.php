<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\imageUploadTrait;
use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\updateUserRequest;
use Illuminate\Support\Facades\Storage;

class usersController extends Controller
{
    use imageUploadTrait;
    public function store(AuthUserRequest $request){
        $validated = $request ->validated();

        $validated['image'] = imageUploadTrait::uploadImage($request , 'image' , 'uploads/users');


        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

       if ($user) {
        return response()->json([
            'status' => true,
            'message'=> 'user created successfully..',
        ]);
       }else{

        return response()->json([
            'status' => false,
            'message'=> 'there is a problem please try again !!',
        ]);

       }



    }


    public function Delete(Request $request)
    {
        $user  =  User::findOrFail($request->id);
        $image_path = 'uploads/users/'.$user->image;



        $user->delete();

        unlink(public_path($image_path));


        return response()->json([
            'status' => true,
             "message" => "user deleted successfully..",
             'id' => $request->id,
        ]);
    }

    public function Update(updateUserRequest $request){
        $validated =  $request->validated();

        $user = User::findOrFail($request->id);

        if (!$user) {
            return response()->json([
                'status' => false,
                 "message" => "problem with updating please try again !!",
            ]);
        }

        $user->Update($validated);

        return response()->json([
            'status' => true,
             "message" => "user updated successfully..",
        ]);




    }
}
