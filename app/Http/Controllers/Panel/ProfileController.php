<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Expression;

class ProfileController extends Controller
{
    public function show()
    {

        return view('panel.profile');
    }

    public function update(UpdateProfileRequest $request)
    {
        $date = $request->validated();

        if($request->password){
            $date['password'] = Hash::make($request->password);
        }else{
            unset($date['password']);
        }
        if($request->hasFile('profile')){
            $file = $request->file('profile');
            // avatar.png
            $ext = $file->getClientOriginalExtension(); // png
            $file_name= auth()->user()->id. '_' . time().'.'. $ext;
            $file->storeAs('images/users', $file_name, 'public_files');
            $date['profile'] = $file_name;
        }

        auth()->user()->update($date);
        session()->flash('status', 'اطلاعات کاربری شما ویرایش شد.');
        return back();
    }
}
