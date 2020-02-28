<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table="blogposts";
    protected $fillable=[
        'blogpost'
    ];
    protected $hidden=[

    ];
  
    public function findUser()
    {
        return $this->with('user', 'user.posts')->get()->toArray();
    }

    public function createComment($data)
    {
        $this->find($data['id'])->comments()->create([
            'user_id'=>auth()->user()->id,
            'comment' => $data['comment'],
        ]);
    }

    public function selectPosts($data)
    {
        return $this->where('id',$data)->get();
    }

    public function updatePosts($data){
        return $this->where('id',$data['post_id'])->update(['blogpost'=>$data['post']]);
    }

    public function deletePosts($data)
    {
        $this->where('id','=',$data['postId'])->delete();
    }

    public function comments()
    {
        return $this->hasMany('App\Model\Comment', 'blog_post_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}