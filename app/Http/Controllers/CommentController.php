<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($postId)
    {
    return Comment::where('post_id', $postId)->get();


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
        'content' => 'required|string|max:1000',
        'post_id' => 'required|exists:posts,id'
    ]);
            Comment::create([
        'content' => $request->content,
        'user_id' => Auth::id(),
        'post_id' => $request->post_id
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $comment = Comment::findOrFail($id);

    if ($comment->user_id != Auth::id()) {
        return response()->json(['message' => 'غير مسموح'], 403);
    }

    $request->validate([
        'content' => 'required'
    ]);

    $comment->update([
        'content' => $request->content
    ]);

    return $comment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
          $comment = Comment::findOrFail($id);

    if ($comment->user_id != Auth::id()) {
        return response()->json([
            'message' => 'غير مسموح حذف تعليق شخص آخر'
        ], 403);
    }

    $comment->delete();

    return response()->json([
        'message' => 'تم حذف التعليق'
    ]);
    }
}
