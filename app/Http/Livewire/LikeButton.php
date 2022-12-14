<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Notifications\EmailLikeComment;
use App\Notifications\EmailLikedForumPost;
use App\Notifications\EmailLikedProfilePost;
use App\Notifications\SiteLikeComment;
use App\Notifications\SiteLikedForumPost;
use App\Notifications\SiteLikedProfilePost;
use Livewire\Component;

class LikeButton extends Component
{

    public $model;
    public $likes = 0;
    public $liked = false;

    public function mount($model) {
        $this->model = $model;
        if(\Auth::check()) {
            $this->calculate();
        }

    }

    public function like()
    {
        if (\Auth::check()) {
        if (!$this->liked) {
            $this->model->likes()->create([
                'user_id'=>auth()->user()->id
            ]);
            $this->calculate();
            $owner = $this->model->user;
            switch(get_class($this->model)) {
                case "App\Models\Comment":
                    shane()->notify($owner,auth()->user()->name.' likes your comment.',$this->model->getRoute(),'like_comment');
                    break;
                case "App\Models\Feed":

                    break;
                case "App\Models\Post":

                    break;
            }

        } else {
            $like = $this->model->likes()->where([
                ['user_id','=',auth()->user()->id]
            ])->first();
            $like->delete();
            $this->calculate();
        }

    }
    }

    public function calculate() {
        if(\Auth::check()) {
            $this->liked = $this->model->likes()->where([
                ['user_id','=',auth()->user()->id]
                ])->count()>0;
        }
        $this->likes = $this->model->likes()->count();

    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
