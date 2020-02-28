<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\BlogPost;
use App\Model\Comment;

class UserController extends Controller
{

    private $supermodel;
    private $blog;
    private $comment;

    public function __construct(User $supermodel,BlogPost $blog,Comment $comment)
    {
        $this->supermodel=$supermodel;
        $this->blog=$blog;
        $this->comment=$comment;
        $this->middleware('auth');
    }

    public function createComment(Request $request)
    {
        $this->blog->createComment($request->all());  
        return redirect()->back();
    }

    public function toComment($id)
    { 
        $comment=$this->comment->selectComments($id)->toArray();
       return view('updateComment',['comment'=>$comment]);
    }

    public function updateComment(Request $request)
    { 
        $this->comment->updateComments($request->all());
        return redirect()->intended('home');
    }

    public function deleteComment(Request $request)
    {    
        $this->comment->deleteComments($request->all());
        return redirect()->back();
    }

    public function createPost(Request $request)
    {
        $this->supermodel->createPost($request->all());
        return redirect()->back();
    }

    public function toUpdatePost($id)
    { 
        $post=$this->blog->selectPosts($id);
       return view('update_mypost',['post'=>$post]);
    }

    public function updatePost(Request $request)
    { 
        $post=$this->blog->updatePosts($request->all());
        return redirect()->intended('home');
    }

    public function deletePost(Request $request)
    {     
        $this->blog->deletePosts($request->all());
        return redirect()->back();
    }
}