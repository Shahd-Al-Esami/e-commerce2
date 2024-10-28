<?php

namespace App\Http\Traits;
use Illuminate\Http\Request;

trait UploadImageTrait
{
    public function uploadImage(Request $request,$folderName){
        // Check if the file is present in the request
         if ($request->hasFile('path')) {
            $image = $request->file('path')->getClientOriginalName();
            $path = $request->file('path')->storeAs($folderName, $image, 'img');
            return $path;
        }
       //  else{
        //    return null;

        // }


    }



}
