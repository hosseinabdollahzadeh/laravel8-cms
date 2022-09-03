<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Comment::create($data);
        session()->flash('status', 'نظر شما با موفقیت ثبت شد و پس از تأیید مدیر، نمایش داده خواهد شد.');
        return back();
    }
}
