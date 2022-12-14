<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function owner() {
        return $this->belongsTo(User::class,'owner_id');
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function likes() {
        return $this->hasMany(Like::class);
    }
    public function getRoute() {
        return route('profile',['id'=>$this->user->id,'#post_'.$this->id]);
    }
}
