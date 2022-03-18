<?php
namespace App\Traits;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
 
trait ImageUpload
{
    public function UserImageUpload($query,$fpath) // Taking input image as parameter
    {
        $image_name = Str::random(20);
        $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = "public/$fpath";    //Creating Sub directory in Public folder to put image
        $image_url = $image_full_name;
        $success = $query->storeAs($upload_path,$image_full_name);
 
        return $image_url; // Just return image
    }
}