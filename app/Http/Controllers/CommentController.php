<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addcomment(Request $request, Post $post) {
        $request->validate([
            'post_id' => ['required'],
            'nama' => ['required'],
            'comment' => ['required'],
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'nama' => $request->nama,
            'comment' => $request->comment
        ]);
        return redirect()->route('lihatpostingan');
    }
}
