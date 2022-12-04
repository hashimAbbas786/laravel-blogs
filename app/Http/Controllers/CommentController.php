<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request) {
        $name = $request->name;
        $id = $request->blog;
        $email = $request->email;
        $message = $request->message;
        $status = 1;
        $reply = $request->reply;
        Comment::create([
            "name" => $name,
            "comment" => $message,
            "comment_id" => ($reply == "null") ? null : $reply,
            "blog_id" => $id,
            "status" => $status
        ]);
        return redirect()->back();
    }
}
