<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'user_id',
        'comment'
    ];
    protected $hidden=[

    ];
    
    public function selectComments($data)
    {
        return $this->where('id','=',$data)->get();
    }

    public function updateComments($data)
    {
        return $this->where('id','=',$data['comment_id'])->update(['comment'=>$data['comment']]);
    }

    public function deleteComments($data)
    {
        return $this->where('id','=',$data['comment_id'])->delete();
    }
    
    public function post()
    {
        return $this->belongsTo('App\Model\BlogPost');
    }
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}