<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function profile(){
        return view('profile', array('user' => Auth::user()));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $this->validate($request, [
            'name' => 'required',
            'surname' => 'nullable',
            'last_name' => 'nullable',
            'logo' => 'nullable',
        ]);
        $path = $data['logo']->store('public/avatars');
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->last_name = $data['last_name'];
        $user->logo = $path;
//        $request->file('logo')->store('avatars');
        $user->save();
        return redirect('profile');
    }
}
