<?php

namespace App\Queries;

use App\Models\Channel;
use App\Models\CommunityLink;
use Illuminate\Support\Facades\DB;

class CommunityLinkQuery

{

    public function getByChannel(Channel $channel)
    {
        if (request()->exists('popular')) {
            $links = $channel->channelLinks()->where('approved', true)->withCount('users')->orderBy('users_count', 'desc')->paginate(10);
        } else {
            $links = $channel->channelLinks()->where('approved', true)->paginate(10);
        }
        return $links;
    }

    public function getAll()
    {
        $links = CommunityLink::where('approved', true)->latest('updated_at')->paginate(25);
        return $links;
    }


    public function getMostPopular()
    {
        $links = CommunityLink::where('approved', true)->withCount('users')->orderBy('users_count', 'desc')->paginate(25);;
        return $links;
    }

    public function searchLink($value)
    {
        $links = CommunityLink::where('approved', true)
            ->whereAny(['link','title'], 'LIKE', "%{$value}%")
            ->paginate(10);
        return $links;
    }
}
