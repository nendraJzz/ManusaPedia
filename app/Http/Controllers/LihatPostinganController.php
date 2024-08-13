<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LihatPostinganController extends Controller
{
    public function index() {
        $posts = Post::with('comments')->latest()->get();
        return view('lihatpostingan', compact('posts'));
    }

    public function explore() {
        $posts = Post::all();
        return view('explorepostingan', compact('posts'));
    }
}
