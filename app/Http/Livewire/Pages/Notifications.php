<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Notifications\Notification;
use Livewire\Component;

class Notifications extends Component
{

    public $tab = 'all';

    public function setTab($tab) {
        $this->tab = $tab;
    }

    public function gotourl($notification) {
        $object = $this->getNotificationObject($notification);
        $object->markAsRead();
        return redirect($object->data['url']);
    }

    public function markUnread($notification) {
        $object = $this->getNotificationObject($notification);
        $object->markAsUnRead();
        $this->emit('updateHeader');
    }

    public function markRead($notification) {
        $object = $this->getNotificationObject($notification);
        $object->markAsRead();
        $this->emit('updateHeader');
    }

    private function getNotificationObject($notification) {
        return auth()->user()->notifications()->where('id',$notification['id'])->first();
    }

    public function render()
    {
        if($this->tab == 'all') {
            $notifications = auth()->user()->notifications;
        } else {
            $notifications = auth()->user()->unreadNotifications;
        }
        return view('livewire.pages.notifications',[
            'notifications'=>$notifications,
            'all'=>auth()->user()->notifications()->count(),
            'unread'=>auth()->user()->unreadNotifications()->count()
        ]);
    }
}
