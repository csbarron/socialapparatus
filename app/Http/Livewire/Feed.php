<?php

namespace App\Http\Livewire;

use App\Notifications\EmailPostsToProfile;
use App\Notifications\SitePostsToProfile;
use Livewire\Component;
use Livewire\WithPagination;

class Feed extends Component
{

    use WithPagination;

    public $user;
    public $post;

    protected $listeners = [
        'updateCommentsCount'=>'render'
    ];

    public function mount($user) {
        $this->user = $user;
    }



    public function refreshAll() {
        return back();
    }

    public function save() {
        $this->validate([
            'post'=>'required'
        ]);
        $this->resetErrorBag();
        $feed = $this->user->feeds()->create([
            'owner_id'=>auth()->user()->id,
            'post'=>$this->post
        ]);
        //don't notify myself
        if(auth()->user()->id !== $this->user->id) {
            shane()->notify($feed->user,auth()->user()->name.' posted to your profile.',$feed->getRoute(),'feed_post');
        }
        $this->reset('post');
    }

    public function render()
    {
        return view('livewire.feed',[
            'feeds'=>$this->user->feeds()->orderBy('created_at','desc')->paginate(5)
        ]);
    }
}
