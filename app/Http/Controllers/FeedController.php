<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Http\Requests\StoreFeedRequest;
use App\Http\Requests\UpdateFeedRequest;

class FeedController extends Controller
{
    public function delete() {
        $id = request()->input('id');
        $feed = Feed::find($id);
            if(shane()->canDelete($feed)) {
                $feed->delete();
            }
        return redirect()->back();
    }
}
