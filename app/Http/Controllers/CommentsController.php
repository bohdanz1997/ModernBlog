<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
    public function store(CommentRequest $request)
    {
        $comment = Comment::create($request->all());

        return response()->json($comment);
    }
}
