<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        return view('admin');
    }

    public function blockUser(){
        $users = User::paginate(10);
        return view('userBlock',['users' => $users]);
    }

    public function blockedUser(Request $request,$userId){

        $user = User::find($userId);
       if($user->status=='active') {
            $user->update(['status'=>'blocked']);
        } else {
            $user->update(['status'=>'active']);
        }


        return redirect('admin/user-block');
    }
}
