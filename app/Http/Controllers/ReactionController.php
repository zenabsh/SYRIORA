<?php

namespace App\Http\Controllers;

use App\Models\Reaction;
use App\Models\PostReaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'post_id' => 'required|exists:posts,id',
        'reaction_id' => 'required|exists:reactions,id'
    ]);

    $reaction = PostReaction::updateOrCreate(
        [
            'user_id' => Auth::id(),
            'post_id' => $request->post_id
        ],
        [
            'reaction_id' => $request->reaction_id
        ]
    );

    return $reaction;
    }

    /**
     * Display the specified resource.
     */
    public function show(Reaction $reaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reaction $reaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reaction $reaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($postId)
    {
        PostReaction::where('post_id',$postId)
        ->where('user_id',Auth::id())
        ->delete();

    return response()->json([
        'message' => 'تم حذف التفاعل'
    ]);
    }
    public function count($postId)
{
    return PostReaction::where('post_id',$postId)
        ->count();
}
}
