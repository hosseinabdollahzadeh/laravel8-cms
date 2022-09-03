<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikePostController extends Controller
{
    public function store(Post $post)
    {
        $post->likes()->toggle(
            auth()->user()->id
        );
        return response(['ok'], 200);
    }
}
