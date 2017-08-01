<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use File;

class ImageUpload
{
    public $file;

    public function uploadFile(UploadedFile $file, $currentImage)
    {
        $this->file = $file;

        $this->deleteCurrentImage($currentImage);

        return $this->saveImage();
    }

    public function deleteCurrentImage($currentImage)
    {
        if ($this->fileExists($currentImage)) {
            File::delete($this->getFolder() . $currentImage);
        }
    }

    public function fileExists($currentImage)
    {
        if (!empty($currentImage)) {
            return File::exists($this->getFolder() . $currentImage);
        }
    }

    public function saveImage()
    {
        $fileName = $this->generateFileName();

        $this->file->move($this->getFolder(), $fileName);

        return $fileName;
    }

    public function getOriginalFileName()
    {
        return $this->file->getClientOriginalName();
    }

    private function getFolder()
    {
        return public_path() . '//uploads/';
    }

    private function generateFileName()
    {
        return strtolower(md5(uniqid($this->getOriginalFileName())));
    }
}
