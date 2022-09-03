<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\UserCreateRequest;
use App\Http\Requests\Panel\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate();
        return view('panel.users.index', compact('users'));
    }

    public function create()
    {
        return view('panel.users.create');
    }

    public function store(UserCreateRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make('password');

        User::create($data);

        $request->session()->flash('status', 'کاربر با موفقیت ایجاد شد.');

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('panel.users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {

        $user->update(
            $request->validated()
        );
        $request->session()->flash('status', 'اطلاعات کاربر با موفقیت ویرایش شد.');

        return redirect()->route('users.index');
    }
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        $request->session()->flash('status', 'کاربر با به درستی حذف شد.');

        return back();
    }
}
