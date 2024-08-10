<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::count();
        return view('home', compact('posts'));
    }

    //     public function index () {
    //     $user = User::find(Auth::id());

    //     return view('post.index',[
    //         'user' => $user,
    //         'post' => $user->Post()->latest()->get()
    //     ]);
    // }
}
