<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

trait StorageImageTraits{

    public function getUploadedImageInfo($image_file, $storeDirName): array
    {
            $fileNameOrigin = pathinfo($image_file->getClientOriginalName(),PATHINFO_FILENAME); // original file name
            $fileNameHash = $fileNameOrigin . '.' . Carbon::now()->valueOf() . '.' .$image_file->getClientOriginalExtension(); // final filename
            $filePath = $image_file->storeAs('public/'. $storeDirName .'/'. auth()->id(), $fileNameHash); // path to image
        return [
            'file_name' => $fileNameHash,
            'file_path' => Storage::url($filePath)
        ];
    }
}
