<?php
namespace App\Http\Traits;

use Illuminate\Http\Request;

trait imageUploadTrait{

    public static function uploadImage(Request $request , $requestVal , $path)
    {
        $file = $request->file($requestVal);

        $name = md5(time()) . '.' . $file->getClientOriginalExtension();

        $imageName =$file->move(public_path($path),$name);

        return $imageName->getFilename();


    }


}
