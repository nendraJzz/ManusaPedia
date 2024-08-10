<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function addpost(Request $request) {
        $request->validate([
            'deskripsi' => ['required'],
            'gambar' => ['required'],
        ]);

        $imagePath = $this->storeImage($request->file('gambar'));

        Post::create([
            'user_id' => Auth::id(),
            'deskripsi' => $request->deskripsi,
            'image' => $imagePath
        ]);
        return redirect()->route('home');
    }

    public function storeImage ($file): string{
        $fileName = rand() .  $file->getClientOriginalName();
        $file->move('uploads', $fileName);
        return "/uploads/" . $fileName;
    }
    
    public function delete($id)
    {
        $data = Post::findOrFail($id);
        $data->delete();
        return redirect()->route('lihatpostingan');
    }

    public function updatedata(Request $request,$id){
        $data = Post::find($id);
        $data->update($request->all());
        return redirect()->route('lihatpostingan');
    }

}
