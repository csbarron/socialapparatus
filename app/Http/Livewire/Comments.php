<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Notifications\EmailCommentsForumPost;
use App\Notifications\EmailCommentsOnProfilePost;
use App\Notifications\Notification;
use App\Notifications\SiteCommentsForumPost;
use App\Notifications\SiteCommentsOnProfilePost;
use Livewire\Component;

class Comments extends Component
{

    public $comment;
    public $comments = [];

    public $model;

    protected $listeners = [
        'refreshAll'=>'render'
    ];

    public function mount($model) {
        $this->model = $model;
        $this->calculate();
    }

    public function calculate() {
        $this->comments = $this->model->comments()->get();
    }

    public function save() {
        $type = '';
        $this->validate([
            'comment'=>'required'
        ]);
        $this->resetErrorBag();
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->comment = $this->comment;
        switch(get_class($this->model)) {
            case "App\Models\Feed":
                $comment->feed_id = $this->model->id;
                $type = 'profile post';
                $action = 'comment_feed';
                break;
            case "App\Models\Post":
                $comment->post_id = $this->model->id;
                $type = 'forum post';
                $action = 'comment_forum_post';
                break;
        }
        $comment->save();
        $subject = auth()->user()->name. " commented on your $type.";
        shane()->notify($this->model->user,$subject,$this->model->getRoute(),$action);
        $this->reset('comment');
        $this->emit('updateCommentsCount');
        $this->calculate();
    }

    public function render()
    {
        return view('livewire.comments',[
            'comments'=>$this->comments
        ] );
    }
}
