<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use File;

class FileUpload
{
    public $file;

    public function uploadFile(UploadedFile $file, $currentFile)
    {
        $this->file = $file;

        $this->deleteCurrentFile($currentFile);

        return $this->saveFile();
    }

    public function deleteCurrentFile($currentFile)
    {
        if ($this->fileExists($currentFile)) {
            File::delete($this->getFolder() . $currentFile);
        }
    }

    public function fileExists($currentFile)
    {
        if (!empty($currentFile)) {
            return File::exists($this->getFolder() . $currentFile);
        }
    }

    public function saveFile()
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
