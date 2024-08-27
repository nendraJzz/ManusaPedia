<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function edit($id){
        $data = Post::find($id);
        return view('edit', compact('data'));
    }
}
