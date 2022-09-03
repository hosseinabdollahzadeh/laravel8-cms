<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchPostController extends Controller
{
    public function show(Request $request)
    {
        $posts = Post::where('title', 'LIKE', "%{$request->search}%")->paginate(1);

        return view('landing', compact('posts'));
    }
}
