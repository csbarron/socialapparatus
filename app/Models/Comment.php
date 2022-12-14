<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function likes() {
        return $this->hasMany(Like::class);
    }
    public function feed() {
        return $this->belongsTo(Feed::class);
    }
    public function post() {
        return $this->belongsTo(Post::class);
    }
    public function getRoute() {
        if($this->feed_id) {
            $feed = $this->feed;
            $user = $feed->user;
            return route('profile',['id'=>$user->id,'#feed_'.$feed->id]);
        }
        if($this->post_id) {
            $post = $this->post;
            return route('post',['id'=>$post->id,'#comment_'.$this->id]);
        }
    }
}
