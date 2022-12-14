<?php

namespace App\Http\Livewire;

use App\Models\Friendship;
use App\Notifications\EmailAcceptedFriendRequest;
use App\Notifications\EmailSentFriendRequest;
use App\Notifications\SiteAcceptedFriendRequest;
use App\Notifications\SiteSentFriendRequest;
use Livewire\Component;

class FriendsButton extends Component
{


    public $user;
    public $showButtons = [];


    public function mount($user)
    {
        $this->user = $user;
        $this->calculate();
    }

    public function addFriend() {
        Friendship::create([
            'user1_id'=>auth()->user()->id,
            'user2_id'=>$this->user->id,
            'status'=>'requested'
        ]);
        shane()->notify($this->user,auth()->user()->name.' has sent you a friend request.',auth()->user()->getRoute(),'friend_request');
        $this->calculate();
    }

    public function denyRequest() {
        $this->cancelRequest();
    }

    public function cancelRequest() {
        $friendship = $this->friendship();
        $friendship->delete();
        $this->calculate();
    }

    public function acceptRequest() {
        $friendship = $this->friendship();
        $friendship->status = "accepted";
        $friendship->save();
        shane()->notify($this->user,auth()->user()->name.' has accepted your friend request.',auth()->user()->getRoute(),'friend_request_accepted');
        $this->calculate();
    }

    public function unFriend() {
        $friendship = $this->friendship();
        $friendship->delete();
        $this->calculate();
    }

    public function calculate()
    {
        if(\Auth::check()) {
            if(auth()->user()->id == $this->user->id) {
                $this->reset('showButtons');
                return;
            }
            $friendship = $this->friendship();
            if($friendship) {
                switch($friendship->status) {
                    case "requested":
                        if($friendship->user1_id === auth()->user()->id) {
                            $this->showButtons = ['cancel'];
                        } else {
                            $this->showButtons = ['deny','accept'];
                        }
                        break;
                    case "accepted":
                        $this->showButtons = ['unfriend'];
                        break;
                }
            } else {
                $this->showButtons = [
                    'add'
                ];
            }
        }

    }

    private function friendship()
    {
        return Friendship::where([
            ['user1_id', '=', auth()->user()->id],
            ['user2_id', '=', $this->user->id]
        ])->orWhere([
            ['user1_id', '=', $this->user->id],
            ['user2_id', '=', auth()->user()->id]
        ])->first();
    }


    public function render()
    {
        return view('livewire.friends-button');
    }
}
