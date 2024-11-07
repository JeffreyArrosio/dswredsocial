<?php

namespace App\Http\Controllers;

use App\Models\CommunityLink;
use App\Models\Channel;
use App\Queries\CommunityLinkQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommunityLinkForm;


class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Channel $channel = null)
    {
        if (request()->exists('search')) {
            $value = request()->get('search');
            $links = (new CommunityLinkQuery())->searchLink($value);
        } else
        if ($channel) {
            $links = (new CommunityLinkQuery())->getByChannel($channel);
        } else {
            request()->exists('popular') ? $links = (new CommunityLinkQuery())->getMostPopular() :
                $links = (new CommunityLinkQuery())->getAll();
        }
        $channels = Channel::orderBy('title', 'asc')->get();
        return view('dashboard', compact('links', 'channels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function myLinks()
    {
        $user = Auth::user();
        $links = $user->myLinks()->paginate(10);
        return view('mylinks', compact('links'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunityLinkForm $request)
    {
        $data = $request->validated();
        $link = new CommunityLink($data);
        if ($link->hasAlreadyBeenSubmitted()) {
            return back();
        } else {
            $link->user_id = Auth::id();
            $link->approved = Auth::user()->trusted ?? false;
            $link->save();
            if (Auth::user()->trusted) {
                return back()->with('success', 'Link subido exitosamente!');
            } else {
                return back()->with('failure', 'Link pendiente de aprobación');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }
}
