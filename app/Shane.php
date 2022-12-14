<?php

namespace App;

use App\Models\Friendship;
use App\Models\User;
use App\Notifications\Actions;
use Illuminate\Notifications\Action;

class Shane
{

    public $route;

    public function __construct()
    {
        $this->route = \Route::currentRouteName();
    }

    public function categories()
    {
        $categories = [
            'arts',
            'autos',
            'beauty',
            'bikes',
            'celebs',
            'computers',
            'diet',
            'divorce',
            'film',
            'food',
            'gaming',
            'garden',
            'history',
            'housing',
            'jobs',
            'jokes',
            'legal',
            'marriage',
            'money',
            'music',
            'parent',
            'pets',
            'photo',
            'politics',
            'religion',
            'science',
            'sports',
            'travel',
            'tv',
        ];
        return $categories;
    }

    public function showAside()
    {
        if (in_array($this->route, [
            'home', 'community', 'category', 'profile', 'user.edit'
        ])) {
            return true;
        }
        return false;
    }

    /**
     * @param $user User
     * @param $subject  string
     * @param $url  string
     * @param $action   string
     */
    public function notify($user, $subject, $url, $action)
    {
        $preferences = json_decode($user->notification_preferences, true);
        switch ($action) {
            case 'feed_post':
                if ($preferences['ef']) {
                    $user->notify(new Actions('mail', $subject, $url));
                }
                if ($preferences['sf']) {
                    $user->notify(new Actions('database', $subject, $url));
                }
                break;
            case 'like_feed':
                if ($preferences['elf']) {
                    $user->notify(new Actions('mail', $subject, $url));
                }
                if ($preferences['slf']) {
                    $user->notify(new Actions('database', $subject, $url));
                }
                break;
            case "comment_feed":
                if ($preferences['ecf']) {
                    $user->notify(new Actions('mail', $subject, $url));
                }
                if ($preferences['scf']) {
                    $user->notify(new Actions('database', $subject, $url));
                }
                break;
            case "friend_request":
                if ($preferences['efr']) {
                    $user->notify(new Actions('mail', $subject, $url));
                }
                if ($preferences['sfr']) {
                    $user->notify(new Actions('database', $subject, $url));
                }
                break;
            case "friend_request_accepted":
                if ($preferences['efa']) {
                    $user->notify(new Actions('mail', $subject, $url));
                }
                if ($preferences['sfa']) {
                    $user->notify(new Actions('database', $subject, $url));
                }
                break;
            case "like_forum_post":
                if ($preferences['elp']) {
                    $user->notify(new Actions('mail', $subject, $url));
                }
                if ($preferences['slp']) {
                    $user->notify(new Actions('database', $subject, $url));
                }
                break;
            case "comment_forum_post":
                if ($preferences['ecp']) {
                    $user->notify(new Actions('mail', $subject, $url));
                }
                if ($preferences['scp']) {
                    $user->notify(new Actions('database', $subject, $url));
                }
                break;
            case "like_comment":
                if ($preferences['elc']) {
                    $user->notify(new Actions('mail', $subject, $url));
                }
                if ($preferences['slc']) {
                    $user->notify(new Actions('database', $subject, $url));
                }
                break;


        }
    }

    public function friends($user)
    {
        return Friendship::where([
                ['user1_id', '=', auth()->user()->id],
                ['user2_id', '=', $user->id],
                ['status', '=', 'accepted']
            ])->orWhere([
                ['user2_id','=',auth()->user()->id],
                ['user1_id','=',$user->id],
                ['status','=','accepted']
            ])->count() > 0;
    }

    public function canDelete($model) {
        switch(get_class($model)) {
            case "App\Models\Feed";
            if($model->owner_id == auth()->user()->id ||  $model->user_id == auth()->user()->id) {
                return true;
            }
            break;
        }
        return false;
    }
    public function canComment($model) {
        switch(get_class($model)) {
            case "App\Models\Feed":
                if(auth()->user()->id == $model->user_id) {
                    return true;
                }
                if(auth()->user()->id == $model->owner_id) {
                    return true;
                }
                if(shane()->friends($model->user) || shane()->friends($model->owner)) {
                    return true;
                }
                return false;
                break;
        }
        return true;
    }

    public function isAdmin() {
        if(auth()->user()->id == 1) {
            return true;
        }
        if(auth()->user()->admin) {
            return true;
        }
        return false;
    }
}
