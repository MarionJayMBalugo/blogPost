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
        return view('home',['post'=>$this->userModel->getAllPosts()]);
    }

    public function myPost()
    {   
        return view('mypost',['myPosts'=>$this->userModel->getMyPosts()]);
    }
}