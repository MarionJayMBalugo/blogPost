<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Support\Facades\Auth;
class User extends Authenticatable 
{
    use AuthenticableTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function getAllPosts()
    {
        return $this->with('posts', 'posts.comments', 'posts.comments.users')->get();
    }

    

    public function getMyPosts()
    {
      
        return $this->with('posts', 'posts.comments', 'posts.comments.users')->where('id',auth()->user()->id)->get();
    }

    public function createPost($data){
        return $this->find($data['id'])->posts()->create([
            'blogpost' => $data['post'],
        ]);
    }
    public function posts()
    {
        return $this->hasMany('App\Model\BlogPost', 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Model\Comment', 'user_id', 'id');
    }
}