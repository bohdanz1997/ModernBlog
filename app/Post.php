<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\FileUpload;

class Post extends Model
{
    protected $fillable = ['name', 'content', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function uploadFileAndSave($file, $currentFile = '')
    {
        $fileUploadModel = new FileUpload;

        $fileName = $fileUploadModel->uploadFile($file, $currentFile);

        $this->file = $fileName;

        return $this->save();
    }

    public function getFile()
    {
        return '/uploads//' . $this->file;
    }

    public function deleteFile()
    {
        $fileUploadModel = new FileUpload;
        $fileUploadModel->deleteCurrentFile($this->file);
    }

    public function getDate()
    {
        return $this->created_at->toFormattedDateString();
    }
}
