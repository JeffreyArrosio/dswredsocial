<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\CommunityLink;
use Illuminate\Http\Request;
use App\Queries\CommunityLinkQuery;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        if (request()->exists('search')) {
            $value = request()->get('search');
            $links = (new CommunityLinkQuery())->searchLink($value);
        } else {
            request()->exists('popular') ? $links = (new CommunityLinkQuery())->getMostPopular() :
                $links = (new CommunityLinkQuery())->getAll();
        }
        if (is_null($links->first())) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No hay links',
            ], 200);
        }
        $response = [
            'status' => 'success',
            'message' => 'Estos son los links',
            'links' => $links,
        ];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $link = CommunityLink::find($id);
        if ($link) {
            return response()->json([
                'status' => 'success',
                'message' => 'Link encontrado',
                'link' => $link,
            ], 200);
        }else{
            return response()->json([
                'status' => 'failure',
                'message' => 'Link no encontrado',
            ], 200);
        }
        
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
