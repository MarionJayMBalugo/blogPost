<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BlogPost;
use App\User;
use DB;
class HomeController extends Controller
{

    /** @var User $userModel */
    private $userModel;
    private $blog;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $userModel,BlogPost $blog)
    {
        $this->userModel = $userModel;
        $this->blog = $blog;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $post=$this->userModel->getAllPosts()->toArray();
        return view('home',['post'=>$post]);
    }

    public function myPost()
    {
        $post=$this->userModel->getMyPosts()->toArray();
        return view('mypost',['post'=>$post]);
    }
}