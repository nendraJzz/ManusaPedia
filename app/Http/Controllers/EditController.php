<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function edit(){
        $data = Post::all();
        return view('edit', compact('data'));
    }
}
