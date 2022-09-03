<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ShowPostCategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->paginate();
        return view('landing', compact('posts'));
    }
}
