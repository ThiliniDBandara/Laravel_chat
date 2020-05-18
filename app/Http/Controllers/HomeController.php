<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\user;
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
        //select all users except logged in user
        $users = User::where('id','!=', Auth::id())->get();
        return view('home', ['users'=>$users]);
    }
}
