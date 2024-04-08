<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadImage
{
    public function upload($image,$folderName){
        return $image->store($folderName, 'public');
    }

    public function deleteImage($image,$folder){
        if (Storage::exists('public/' .$folderName, $image)) {
            Storage::delete('public/' .$folderName, $image);
        }
    }

    public function updateImage($folder){
        $this->deleteAvatar($folder);
    }
}
