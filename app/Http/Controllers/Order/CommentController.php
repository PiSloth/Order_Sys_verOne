<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function add(){
        $comment = new Comment;
        $comment->content = request()->content;
        $comment->order_id = request()->order_id;
        $comment->user_id = request()->user_id;
        $comment->save();
        return back();
    }
}
