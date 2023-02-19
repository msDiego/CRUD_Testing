<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityResource;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return CommunityResource::collection(Community::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): CommunityResource
    {
        $community = Community::create([
            'titulo' => $request->titulo,
        ]);

        return new CommunityResource($community);
    }

    /**
     * Display the specified resource.
     */
    public function show(Community $community): CommunityResource
    {
        return new CommunityResource($community);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Community $community): Response
    {
        $community->create([
            'titulo' => $request->titulo,
        ]);

        $content = new CommunityResource($community);
        return response($content) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community): Response
    {
        $community->delete();
        return response()->noContent();
    }

}
