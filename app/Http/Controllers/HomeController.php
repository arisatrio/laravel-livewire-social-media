<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Like;
use App\Models\Postingan;

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

    public function yourPost()
    {
        return view('your-post');
    }

    public function profile()
    {
        return view('profile');
    }

    public function likedPost()
    {
        return view('liked-post');
    }

    public function cek()
    {
        $user       = auth()->user();
        $postingan  = Like::where('user_id', $user->id)->get();
        //$likedPost  = $postingan;

        foreach($postingan as $data){
            echo $data;
        }
        //dd($postingan);

        //$cek->like->contains($user);
        /* $cek        = $user->like()->where('user_id', $user->id)->get();
        $id         = $user->like();
        $disukai    = $user->like()->where('postingan_id', $this->item->postingan_id)->first(); */
        //dd($id);
    }
}